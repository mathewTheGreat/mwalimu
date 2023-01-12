<?php
    class Course {
        // class properties and constructor

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        public function create() {
            $stmt = $this->pdo->prepare('INSERT INTO courses (title, description, syllabus, prerequisites, length, audience, image, lectures, quizzes, assignments, schedule, price, instructor_id, rating, enrollment) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
            $result = $stmt->execute([$this->title, $this->description, $this->syllabus, $this->prerequisites, $this->length, $this->audience, $this->image, $this->lectures, $this->quizzes, $this->assignments, $this->schedule, $this->price, $this->instructor_id, $this->rating, $this->enrollment]);
            return $result;
        }

        public function find($id) {
            $stmt = $this->pdo->prepare('SELECT * FROM courses WHERE id = ?');
            $stmt->execute([$id]);
            $course = $stmt->fetch();
            if($course) {
                $this->title = $course['title'];
                $this->description = $course['description'];
                $this->syllabus = $course['syllabus'];
                $this->prerequisites = $course['prerequisites'];
                $this->length = $course['length'];
                $this->audience = $course['audience'];
                $this->image = $course['image'];
                $this->lectures = $course['lectures'];
                $this->quizzes = $course['quizzes'];
                $this->assignments = $course['assignments'];
                $this->schedule = $course['schedule'];
                $this->price = $course['price'];
                $this->instructor_id = $course['instructor_id'];
                $this->rating = $course['rating'];
                $this->enrollment = $course['enrollment'];
                return true;
            }
            return false;
        }

        public function update($id) {
            $stmt = $this->pdo->prepare('SELECT * FROM courses WHERE id = ?');
            $stmt->execute([$id]);
            if (!$stmt->fetch()) {
                return false;
            }
            $stmt = $this->pdo->prepare('UPDATE courses SET title = ?, description = ?, syllabus = ?, prerequisites = ?, length = ?, audience = ?, image = ?, lectures = ?, quizzes = ?, assignments = ?, schedule = ?, price = ?, instructor_id = ?, rating = ?, enrollment = ? WHERE id = ?');
            $result = $stmt->execute([$this->title, $this->description, $this->syllabus, $this->prerequisites, $this->length, $this->audience, $this->image, $this->lectures, $this->quizzes, $this->assignments, $this->schedule, $this->price, $this->instructor_id, $this->rating, $this->enrollment, $id]);
            return $result;
        }

        public function delete($id) {
            $stmt = $this->pdo->prepare('DELETE FROM courses WHERE id = ?');
            $result = $stmt->execute([$id]);
            return $result;
        }

        public static function getAll($pdo) {
            $stmt = $pdo->prepare('SELECT * FROM courses');
            $stmt->execute();
            $courses = $stmt->fetchAll();
            return $courses;
        }
    }
?>