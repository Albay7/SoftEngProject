<?php
function load_dataset($filename) {
    $file = fopen($filename, "r");
    $dataset = [];
    
    // Read each line from the CSV file and convert it to an array
    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
        if (count($data) == 37) { // 36 questions + 1 course label
            $data_row = [];
            for ($i = 0; $i < 36; $i++) {
                $data_row[] = (int)$data[$i]; // Convert question responses to integers
            }
            $data_row[] = $data[36]; // Add the course label (last column)
            $dataset[] = $data_row;
        }
    }
    fclose($file);

    return $dataset; // Return entire dataset
}


function standardize_data($dataset) {
    $means = [];
    $std_devs = [];

    // Calculate mean and standard deviation for each feature (question)
    for ($i = 0; $i < 36; $i++) {
        $values = array_column($dataset, $i);
        $mean = array_sum($values) / count($values);
        $means[$i] = $mean;
        $variance = array_sum(array_map(fn($x) => pow($x - $mean, 2), $values)) / count($values);
        $std_devs[$i] = sqrt($variance);
    }

    // Standardize dataset
    foreach ($dataset as &$row) {
        for ($i = 0; $i < 36; $i++) {
            if ($std_devs[$i] != 0) {
                $rating_scale = $row[$i];
                if ($rating_scale == 1) {
                    $row[$i] = ($row[$i] - $means[$i]) / $std_devs[$i] * 0.1;
                } elseif ($rating_scale == 2) {
                    $row[$i] = ($row[$i] - $means[$i]) / $std_devs[$i] * 0.3;
                } elseif ($rating_scale == 3) {
                    $row[$i] = ($row[$i] - $means[$i]) / $std_devs[$i] * 0.6;
                }
            }
        }
    }
    return $dataset;
}

function calculate_similarity($user_input, $data) {
    $similarity = 0;
    for ($i = 0; $i < 36; $i++) {
        $similarity += (5 - abs($data[$i] - $user_input[$i])) / 5;
    }
    return ($similarity / 36) * 100; // Return similarity as a percentage
}

function knn_recommendation($dataset, $user_input, $k = 3) {
    $similarities = [];
    foreach ($dataset as $data) {
        $similarity = calculate_similarity($user_input, $data);
        $similarities[] = [$similarity, $data[36]]; // Store similarity and course label
    }

    // Sort by similarity percentage (descending)
    usort($similarities, function($a, $b) {
        return $b[0] <=> $a[0];
    });

    // Collect the top-k nearest neighbors while ensuring uniqueness
    $top_courses = [];
    $seen_courses = [];
    foreach ($similarities as $entry) {
        $course = $entry[1];
        if (!in_array($course, $seen_courses)) {
            $top_courses[] = $entry;
            $seen_courses[] = $course;
        }
        if (count($top_courses) >= $k) {
            break;
        }
    }
    
    return $top_courses;
}

