<?php

$timeSlots = ["Morning", "Afternoon", "Evening"];

$request = [

    "course" => "IS 6465",

    "topic" => "PHP arrays",

    "status" => "Pending review"

];

$requests = [

    [

        "student" => "Amina",

        "course" => "IS 6465",

        "status" => "Pending review"

    ],

    [

        "student" => "Omar",

        "course" => "IS 6495",

        "status" => "Approved"

    ]

];

$courses = ["IS 6465", "IS 6495", "IS 6570"];

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP Array Practice</title>

</head>

<body>

    <h1>PHP Array Practice</h1>

    <h2>Indexed Array</h2>

    <p>

        First time slot:

        <?php echo htmlspecialchars($timeSlots[0]); ?>

    </p>

    <p>

        Second time slot:

        <?php echo htmlspecialchars($timeSlots[1]); ?>

    </p>

    <h2>Associative Array</h2>

    <p>

        Topic:

        <?php echo htmlspecialchars($request["topic"]); ?>

    </p>

    <h2>Multidimensional Array</h2>

    <ul>

        <?php foreach ($requests as $tutoringRequest): ?>

            <li>

                Student:

                <?php echo htmlspecialchars($tutoringRequest["student"]); ?>,

                Course:

                <?php echo htmlspecialchars($tutoringRequest["course"]); ?>,

                Status:

                <?php echo htmlspecialchars($tutoringRequest["status"]); ?>

            </li>

        <?php endforeach; ?>

    </ul>

    <h2>Approved Courses</h2>

    <label for="course">Course:</label>

    <select id="course" name="course">

        <?php foreach ($courses as $course): ?>

            <option value="<?php echo htmlspecialchars($course); ?>">

                <?php echo htmlspecialchars($course); ?>

            </option>

        <?php endforeach; ?>

    </select>

</body>

</html>