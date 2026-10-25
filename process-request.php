<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    exit("This page only accepts form submissions using POST.");

}

$course = trim($_POST["course"] ?? "");

$topic = trim($_POST["topic"] ?? "");

$preferredDate = trim($_POST["preferreddate"] ?? "");

$preferredTime = trim($_POST["preferredtime"] ?? "");

$errors = [];

$allowedCourses = ["IS 6465", "IS 6495", "IS 6570"];

$allowedTimes = ["Morning", "Afternoon", "Evening"];

if (!in_array($course, $allowedCourses, true)) {

    $errors[] = "Please select a valid course.";

}

if (!in_array($preferredTime, $allowedTimes, true)) {

    $errors[] = "Please select a valid preferred time.";

}

if ($topic === "") {

    $errors[] = "The topic is required.";

} elseif (strlen($topic) > 120) {

    $errors[] = "The topic cannot be more than 120 characters.";

}

$dateObject = DateTime::createFromFormat("!Y-m-d", $preferredDate);

$dateIsValid = $dateObject &&

    $dateObject->format("Y-m-d") === $preferredDate;

if (!$dateIsValid) {

    $errors[] = "Please enter a valid preferred date.";

} elseif ($dateObject < new DateTime("today")) {

    $errors[] = "The preferred date cannot be in the past.";

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tutoring Request Results</title>

</head>

<body>

    <?php if (!empty($errors)): ?>

        <h1>Request Error</h1>

        <ul>

            <?php foreach ($errors as $error): ?>

                <li>

                    <?php echo htmlspecialchars($error); ?>

                </li>

            <?php endforeach; ?>

        </ul>

        <p>

            <a href="request-form.html">Return to the request form</a>

        </p>

    <?php else: ?>

        <h1>Request received</h1>

        <p>

            <strong>Course:</strong>

            <?php echo htmlspecialchars($course); ?>

        </p>

        <p>

            <strong>Topic:</strong>

            <?php echo htmlspecialchars($topic); ?>

        </p>

        <p>

            <strong>Preferred date:</strong>

            <?php echo htmlspecialchars($preferredDate); ?>

        </p>

        <p>

            <strong>Preferred time:</strong>

            <?php echo htmlspecialchars($preferredTime); ?>

        </p>

        <p>

            <strong>Status:</strong>

            Pending review

        </p>

    <?php endif; ?>

</body>

</html>