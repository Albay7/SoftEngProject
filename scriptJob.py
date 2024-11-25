import csv
import random

# Define the new questions mapped to categories (Skills, Interests, Knowledge)
questions = [
    # Skills
    (1, "Cyber Threat Intelligence Analyst"), (2, "Game AI Developer"), (3, "Database Manager"),
    (4, "Hardware Design Engineer"), (5, "Data Analyst"), (6, "Penetration Tester"),
    (7, "AI Engineer"), (8, "Game Narrative Designer"), (9, "IT Support Specialist"),
    (10, "Cloud Security Specialist"), (11, "Robotics Engineer"), (12, "Data Scientist"),
    
    # Interests
    (13, "Game AI Developer"), (14, "Cloud Security Specialist"), (15, "Game Narrative Designer"),
    (16, "Cyber Threat Intelligence Analyst"), (17, "Data Analyst"), (18, "Database Manager"),
    (19, "Penetration Tester"), (20, "Robotics Engineer"), (21, "IT Support Specialist"),
    (22, "AI Engineer"), (23, "Hardware Design Engineer"), (24, "Data Scientist"),
    
    # Knowledge
    (25, "Game Narrative Designer"), (26, "Penetration Tester"), (27, "Data Scientist"),
    (28, "Robotics Engineer"), (29, "Database Manager"), (30, "Cloud Security Specialist"),
    (31, "IT Support Specialist"), (32, "Game AI Developer"), (33, "Data Analyst"),
    (34, "AI Engineer"), (35, "Hardware Design Engineer"), (36, "Cyber Threat Intelligence Analyst")
]

# Define the unique job categories
job_categories = set([job_category for _, job_category in questions])

# Number of sample entries per job category
samples_per_job_category = 1000

# Open a CSV file to write the dataset
with open('job_data.csv', 'w', newline='') as file:
    writer = csv.writer(file)
    
    # Write header (for clarity in dataset)
    header = [f"q{i}" for i in range(1, 31)] + ["Job Category"]
    writer.writerow(header)
    
    # Generate data for each job category
    for job_category in job_categories:  # Loop over unique job categories
        for _ in range(samples_per_job_category):
            ratings = []
            
            # Generate random ratings for each of the 30 questions (scale 1 to 5)
            for question_id, job_category_associated in questions:
                if job_category_associated == job_category:
                    # Generate random ratings (scale from 1 to 5)
                    ratings.append(random.randint(1, 5))
                else:
                    # Assume a default rating for unrelated job categories, e.g., 1
                    ratings.append(1)  # Neutral rating for unrelated questions
            
            # Write the ratings along with the job category
            writer.writerow(ratings + [job_category])

print("Job dataset generated.")