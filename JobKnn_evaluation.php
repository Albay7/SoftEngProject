<?php
include 'JobKnn.php'; // Include your KNN implementation for jobs

/**
 * Split the dataset into training and testing sets
 * @param array $dataset
 * @param float $test_ratio - Proportion of the dataset to be used as test data
 * @return array - [$train_data, $test_data]
 */
function split_dataset($dataset, $test_ratio = 0.2) {
    shuffle($dataset); // Randomize the dataset
    $test_size = (int)(count($dataset) * $test_ratio);
    $test_data = array_slice($dataset, 0, $test_size);
    $train_data = array_slice($dataset, $test_size);
    return [$train_data, $test_data];
}

/**
 * Evaluate the accuracy of the KNN model
 * @param array $dataset - The full dataset
 * @param int $k - Number of nearest neighbors to consider
 * @return float - Accuracy of the model as a percentage
 */
function evaluate_knn_accuracy($dataset, $k = 3) {
    list($train_data, $test_data) = split_dataset($dataset);

    $correct = 0;
    $total = count($test_data);

    foreach ($test_data as $entry) {
        $user_input = array_slice($entry, 0, 36); // User's input ratings
        $actual_job = $entry[36]; // Actual job label from the dataset

        $predictions = knn_recommendation($train_data, $user_input, $k);
        $predicted_job = $predictions[0][1] ?? null; // Top prediction

        if ($predicted_job === $actual_job) {
            $correct++;
        }
    }

    return ($correct / $total) * 100; // Return accuracy as a percentage
}

// Load and normalize the dataset
$dataset = load_dataset("C:\Users\Hendrix\VSCODENEW\JobReco\job_data.csv");
$normalized_dataset = standardize_data($dataset);

// Evaluate KNN accuracy
$accuracy = evaluate_knn_accuracy($normalized_dataset, 3); // Using k = 3
echo "KNN Model Accuracy for Job Recommendations: " . round($accuracy, 2) . "%\n";
?>
