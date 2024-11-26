<?php
function load_dataset() {
    $filename = "C:/Users/Hendrix/VSCODENEW/JobReco/job_data.csv"; // Adjust this path as necessary

    // Check if the file exists
    if (!file_exists($filename)) {
        die("Error: The file does not exist at the specified path: $filename\n");
    }

    $fileContents = file_get_contents($filename);
    $dataset = [];

    $lines = explode("\n", $fileContents);

    foreach ($lines as $line) {
        $data = str_getcsv($line, ",");

        if (count($data) == 37) { // 36 features + 1 job label
            $data_row = [];
            for ($i = 0; $i < 36; $i++) {
                $data_row[] = (int)$data[$i]; // Convert responses to integers
            }
            $data_row[] = $data[36]; // Add job label (last column)
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

    // Standardize dataset using the new rating scale (1 = 0%, 2 = 25%, 3 = 50%, 4 = 75%, 5 = 100%)
    foreach ($dataset as &$row) {
        for ($i = 0; $i < 36; $i++) {
            if ($std_devs[$i] != 0) {
                // Standardizing the ratings to percentages
                $rating_scale = $row[$i];
                switch ($rating_scale) {
                    case 1:
                        $row[$i] = 0; // 0% for rating 1
                        break;
                    case 2:
                        $row[$i] = 25; // 25% for rating 2
                        break;
                    case 3:
                        $row[$i] = 50; // 50% for rating 3
                        break;
                    case 4:
                        $row[$i] = 75; // 75% for rating 4
                        break;
                    case 5:
                        $row[$i] = 100; // 100% for rating 5
                        break;
                    default:
                        $row[$i] = 0; // Default case for invalid rating
                        break;
                }
            }
        }
    }

    return $dataset;
}

function calculate_similarity($user_input, $data) {
    $similarity = 0;
    for ($i = 0; $i < 36; $i++) {
        $similarity += (100 - abs($data[$i] - $user_input[$i])) / 100; // Use percentage similarity
    }
    return ($similarity / 36) * 100; // Return similarity as a percentage
}

function knn_recommendation($dataset, $user_input, $k = 3) {
    $similarities = [];

    // Divide the dataset into smaller chunks
    $chunk_size = ceil(count($dataset) / 4); // Dividing it into 4 chunks
    $chunks = array_chunk($dataset, $chunk_size);

    foreach ($chunks as $chunk) {
        foreach ($chunk as $data) {
            $similarity = calculate_similarity($user_input, $data);
            $similarities[] = [$similarity, $data[36]]; // Store similarity and job label
        }
    }

    // Sort by similarity percentage (descending)
    usort($similarities, function($a, $b) {
        return $b[0] <=> $a[0];
    });

    // Collect the top-k nearest neighbors while ensuring uniqueness
    $top_jobs = [];
    $seen_jobs = [];
    foreach ($similarities as $entry) {
        $job = $entry[1];
        if (!in_array($job, $seen_jobs)) {
            $top_jobs[] = $entry;
            $seen_jobs[] = $job;
        }
        if (count($top_jobs) >= $k) {
            break;
        }
    }

    return $top_jobs;
}
?>
