--Old Payment Query
SELECT payments.id as payment_id,
assessment.or_number AS or_number,
CONCAT_WS(' ', students.firstname, students.lastname) stud_name,
assessment.total AS total,
payments.amount AS amount_paid,
payments.total_left AS total_left,
payments.date_paid AS date_paid
FROM payments 
INNER JOIN assessment ON assessment.id=payments.assessment_id 
INNER JOIN students ON students.id=assessment.student_id

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