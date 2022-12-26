--New Payment Query
SELECT
assessment.or_number AS or_number,
CONCAT_WS(' ', students.firstname, students.lastname) stud_name,
payments.amount AS amount_paid,
payments.total_left AS total_left,
payments.date_paid AS date_paid,
payments.total AS total,
payments.amount AS amount,
payments.date_paid AS date_paid,
SUM(payments.total - payments.amount) OVER (PARTITION BY assessment.or_number ORDER BY payments.date_paid) AS balance
FROM payments 
INNER JOIN assessment ON payments.assessment_id=assessment.id
INNER JOIN students ON students.id=assessment.student_id
ORDER BY payments.date_paid

SELECT
    payments.id AS payment_id,
    assessment.or_number AS or_number,
    CONCAT_WS(
        ' ',
        students.firstname,
        students.lastname
    ) stud_name,
    payments.amount AS amount_paid,
    payments.balance AS balance,
    payments.date_paid AS date_paid,
    payments.total AS total,
    payments.amount AS amount,
    payments.date_paid AS date_paid,
    SUM(
        payments.total - payments.amount
    ) OVER(
    PARTITION BY assessment.or_number
ORDER BY
    payments.date_paid
) AS balance
FROM
    payments
INNER JOIN assessment ON payments.assessment_id = assessment.id
INNER JOIN students ON students.id = assessment.student_id
ORDER BY
    payments.date_paid


-- Exam 

SELECT
    assessment.student_id AS student_id,
    assessment.id AS assessment_id,
    assessment.or_number AS or_number,
    CONCAT_WS(
        ' ',
        students.firstname,
        students.lastname
    ) fullname,
    assessment.subtotal AS subtotal,
    assessment.tuition_fee AS tuition_fee,
    payments.balance AS balance,
    (
        payments.balance +(assessment.tuition_fee / 4)
    ) AS prelim_exam,
    (assessment.tuition_fee / 4) AS mid_final
FROM
    payments
INNER JOIN assessment ON assessment.id = payments.assessment_id
INNER JOIN students ON students.id = assessment.student_id



--Subjects

SELECT
    assessment_subject.subjects_list AS subjects_list,
    subjects.subject_code AS subject_code,
    subjects.lec_hours AS lec_hours,
    subjects.lab_hours AS lab_hours,
    subjects.units AS units,
    assessment.student_id AS student_id
FROM
    assessment_subject
INNER JOIN subjects ON assessment_subject.subjects_list = subjects.id
INNER JOIN students ON assessment_subject.student_id = students.id
INNER JOIN assessment ON assessment_subject.student_id = assessment.student_id
WHERE
    students.id=7