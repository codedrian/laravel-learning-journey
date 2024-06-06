- I've created this activity to practice **many-to-many** relationship and create a **pivot table**.

---

Here, the course-student is the pivot table. A **student** can have many course and a **course** 
can have many student. The `pivot table` should derived from alphabetical order of the related model names that contain the related **foreign keys**. 



|  student   |  course_student   |   course    |
|:----------:|:-----------------:|:-----------:|
| _pk_ `id`  | _pk_ `student_id` |  _pk_ `id`  |
| first_name |  pk `course_id`   |    title    |
| last_name  |                   | description |
|   email    |                   |   credits   |
