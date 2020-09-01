<?php

namespace App\Repository;


use App\Data\EditCourseDTO;
use App\Data\FullCourseDTO;
use App\Data\CourseDTO;
use App\Data\MyCourseDTO;
use Database\DatabaseInterface;

class CourseRepository implements CourseRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * ItemRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    public function add(CourseDTO $course)
    {
        $this->db->query("INSERT INTO 
        courses (name, image_url, description, technology_id, user_id) 
        VALUES (?, ?, ?, ?, ?)")
            ->execute([$course->getName(),
                       $course->getImage(),
                       $course->getDescription(),
                       $course->getTechnologyId(),
                       $course->getUserId()

            ]);

    }

    /**
     * @param int $userId
     * @return MyCourseDTO[]| \Generator
     */
    public function findByUserId(int $userId): \Generator
    {
        return $this->db->query("
	            SELECT 
	                   id,
	                   name,
	                   image_url as image
                FROM courses 
            WHERE user_id = ?
            ORDER BY 
              name 
           

        ")->execute([$userId])
            ->fetch(MyCourseDTO::class);
    }

    /**
     * @return FullCourseDTO[]|\Generator
     */
    public function findAll(): \Generator
    {
        return $this->db->query(
            "SELECT
                    c.id,
                    c.name,
                    c.image_url as image,
                    c.description,
                    c.technology_id as technologyId
                   FROM
                    courses c
                    JOIN technologies t on c.technology_id = t.id
                    JOIN users u on c.user_id = u.id
                    ORDER BY c.name 
            "
        )->execute()->fetch(FullCourseDTO::class);
    }

    public function edit(EditCourseDTO $course)
    {
        $this->db->query(
            "UPDATE courses SET
            name = ?,
            image_url =?,
            description = ?,
            technology_id = ?,
            user_id = ?
            WHERE id = ?"
        )->execute([
            $course->getName(),
            $course ->getImage(),
            $course->getDescription(),
            $course->getTechnologyId(),
            $course->getUserId(),
            $course->getId()
        ]);
    }

    public function findOne(int $id): FullCourseDTO
    {
        return $this->db->query(
            "SELECT
                    c.id,
                    c.name,
                    t.name AS technology,
                    c.image_url as image,
                    c.description,
                    c.technology_id as techologyId,
                    c.user_id as userId
       
                   FROM
                    courses c
                    JOIN technologies t on c.technology_id = t.id
                    JOIN users u on c.user_id = u.id
                    WHERE c.id = ?"
        )->execute([$id])->fetchOne(FullCourseDTO::class);
    }

    public function delete(int $id)
    {
        $this->db->query("DELETE FROM courses WHERE id = ?")->execute([$id]);
    }
}