import csv
import random


# Define the new questions mapped to courses (Skills, Knowledge, Interests)
questions = [
    # Skills
    (1, "Computer Science"), (2, "Computer Engineering"), (3, "Information Systems"),
    (4, "Information Technology"), (5, "Cybersecurity"), (6, "Game Development"),
    (7, "Computer Science"), (8, "Game Development"), (9, "Cybersecurity"),
    (10, "Information Technology"), (11, "Computer Engineering"), (12, "Information Systems"),
    
    # Knowledge
    (13, "Computer Science"), (14, "Game Development"), (15, "Cybersecurity"),
    (16, "Information Technology"), (17, "Computer Engineering"), (18, "Information Systems"),
    (19, "Game Development"), (20, "Cybersecurity"), (21, "Computer Science"),
    (22, "Information Systems"), (23, "Computer Engineering"), (24, "Information Technology"),
    (25, "Cybersecurity"), (26, "Game Development"), (27, "Computer Science"),
    (28, "Information Technology"), (29, "Information Systems"), (30, "Computer Engineering"),
    
    # Interests
    (31, "Computer Science"), (32, "Information Technology"), (33, "Cybersecurity"),
    (34, "Game Development"), (35, "Information Systems"), (36, "Computer Engineering")
]

# Define the unique courses
courses = set([course for _, course in questions])

# Number of sample entries per course
samples_per_course = 1500

# Open a CSV file to write the dataset
with open('data.csv', 'w', newline='') as file:
    writer = csv.writer(file)
    
    # Write header (for clarity in dataset)
    header = [f"q{i}" for i in range(1, 37)] + ["Course"]
    writer.writerow(header)
    
    # Generate data for each course
    # Generate data for each course
# Generate data for each course
    for course in courses:  # Loop over unique courses
        for _ in range(samples_per_course):
            ratings = []
            
            # Generate random ratings for each of the 36 questions (scale 1 to 3)
            for question_id, course_associated in questions:
                if course_associated == course:
                    # Generate random ratings (scale from 1 to 3)
                    ratings.append(random.randint(1, 3))
                else:
                    # Assume a default rating for unrelated courses, e.g., 1
                    ratings.append(1)  # Neutral rating for unrelated questions
            
            # Write the ratings along with the course name
            writer.writerow(ratings + [course])

print("Dataset generated.")

print("Dataset generated.")
