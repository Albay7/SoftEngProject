<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_input = [];
    for ($i = 1; $i <= 36; $i++) {
        $user_input[] = isset($_POST["q$i"]) ? (int)$_POST["q$i"] : 0;
    }

    // Include the KNN algorithm
    include 'knn.php';

    // Load and normalize the dataset
    $dataset = load_dataset("data.csv");
    $normalized_dataset = standardize_data($dataset);

    // Perform the recommendation
    $recommended_courses = knn_recommendation($normalized_dataset, $user_input, 3);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Course Recommendation</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                text-align: center;
                margin: 0;
                padding: 20px;
                background-color: #f5f5f5;
            }
            h1 {
                color: #333;
            }
            .result-container {
                margin: 20px auto;
                width: 60%;
                background-color: #fff;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .progress-bar-container {
                display: flex;
                align-items: center;
                margin-bottom: 30px;
                position: relative;
            }
            .progress-bar {
                background-color: #e0e0e0;
                border-radius: 10px;
                flex-grow: 1;
                margin-left: 10px;
                height: 35px;
                overflow: hidden;
                position: relative;
            }
            .progress-bar-inner {
                background-color: #add8e6; /* Baby blue color */
                height: 100%;
                border-radius: 10px;
                width: 0;
                transition: width 1s ease-in-out;
                position: relative;
            }
            .progress-label {
                font-weight: bold;
                color: #add8e6;
                width: 200px;
                text-align: left;
            }
            .progress-bar-inner:hover::after {
                content: attr(data-percentage) "%";
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
                color: #fff;
                font-weight: bold;
                font-size: 14px;
            }
            .tooltip {
                position: absolute;
                background-color: rgba(0, 0, 0, 0.7);
                color: #fff;
                padding: 5px 10px;
                border-radius: 5px;
                font-size: 14px;
                white-space: nowrap;
                display: none;
            }
            .learn-more {
                margin-top: 40px;
                font-size: 18px;
            }
            .learn-more a {
                text-decoration: none;
                color: #7b2cbf;
                font-weight: bold;
            }
        </style>
    </head>
    <body>

    <h1>Hey! The top courses that matched your skills.....</h1>

    <div class="result-container">
        <h2>We recommend the following courses:</h2>

        <?php
        // Display the recommendations with adjusted gaps
        if (!empty($recommended_courses)) {
            $displayed_courses = [];
            $counter = 0;
            foreach ($recommended_courses as $course) {
                if (!in_array($course[1], $displayed_courses)) {
                    $percentage = round($course[0], 2);

                    // Adjust width for top 3 courses with scaling
                    if ($counter === 0) {
                        $percentage = min($percentage + 10, 100); // Top course gets an extra boost
                        $gap = '30px'; // More gap after the first course
                    } elseif ($counter === 1) {
                        $percentage = $percentage * 1.1;
                        $gap = '20px'; // Medium gap after second course
                    } else {
                        $gap = '10px'; // Smaller gap for the third course
                    }

                    echo '
                    <div class="progress-bar-container" style="margin-bottom: ' . $gap . ';">
                        <span class="progress-label">' . htmlspecialchars($course[1]) . '</span>
                        <div class="progress-bar">
                            <div class="progress-bar-inner" data-percentage="' . $percentage . '" style="width: ' . $percentage . '%;"></div>
                        </div>
                    </div>';
                    $displayed_courses[] = $course[1];
                    $counter++;
                }
            }
        } else {
            echo "<p>No course recommendation available.</p>";
        }
        ?>

        <div class="learn-more">
            <p>To know more about these courses <a href="#">click here!</a></p>
        </div>
    </div>

    <script>
        // Optional: Add animation to the progress bars
        window.addEventListener('load', function () {
            const bars = document.querySelectorAll('.progress-bar-inner');
            bars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0';
                setTimeout(() => {
                    bar.style.width = width;
                }, 100);
            });
        });
    </script>

    </body>
    </html>

<?php
}
?>
