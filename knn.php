<?php
function load_dataset() {
    $filename = 'C:\Users\Hendrix\VSCODENEW\CourseReco\data.csv'; // Adjust this path as necessary

    // Check if the file exists
    if (!file_exists($filename)) {
        die("Error: The file does not exist at the specified path: $filename\n");
    }

    $fileContents = file_get_contents($filename);
    $dataset = [];

    $lines = explode("\n", $fileContents);

    foreach ($lines as $line) {
        $data = str_getcsv($line, ",");

        if (count($data) == 37) { // 36 questions + 1 course label
            $data_row = [];
            for ($i = 0; $i < 36; $i++) {
                $data_row[] = (int)$data[$i]; // Convert responses to integers
            }
            $data_row[] = $data[36]; // Add the course label (last column)
            $dataset[] = $data_row;
        }
    }

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

    // Standardize dataset with rating scale adjustments
    foreach ($dataset as &$row) {
        for ($i = 0; $i < 36; $i++) {
            if ($std_devs[$i] != 0) {
                // Standardization
                $standardized_value = ($row[$i] - $means[$i]) / $std_devs[$i];
                
                // Apply rating scale adjustments
                if ($row[$i] == 1) {
                    $row[$i] = $standardized_value * 0.1; // Scale for rating 1
                } elseif ($row[$i] == 2) {
                    $row[$i] = $standardized_value * 0.3; // Scale for rating 2
                } elseif ($row[$i] == 3) {
                    $row[$i] = $standardized_value * 0.6; // Scale for rating 3
                } else {
                    $row[$i] = $standardized_value; // No additional scaling for other ratings
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

    // Divide the dataset into smaller chunks
    $chunk_size = ceil(count($dataset) / 4); // For example, divide into 4 chunks
    $chunks = array_chunk($dataset, $chunk_size);

    foreach ($chunks as $chunk) {
        foreach ($chunk as $data) {
            $similarity = calculate_similarity($user_input, $data);
            $similarities[] = [$similarity, $data[36]]; // Store similarity and course label
        }
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
?>
    
    return $top_courses;
}

