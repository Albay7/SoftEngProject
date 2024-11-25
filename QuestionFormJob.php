<!DOCTYPE html>
<html lang="en">
<head>
<style>
    label {
        display: block;
        width: 400px;
    }
    select {
        width: 200px;
    }
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Path Finder</title>
</head>
<body>
    <h1>Career Path Finder</h1>
    <form action="JobResult.php" method="POST">

        <p>Please rate yourself on the following categories to help us recommend suitable Job Path:</p>
        <h2>Section 1: Skills (Practical Abilities)</h2>
        
<label for="q1">1. Threat Monitoring and Analysis</label>
<select id="q1" name="q1" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Applicable</option>
    <option value="2">Beginner</option>
    <option value="3">Average</option>
    <option value="4">Proficient</option>
    <option value="5">Expert</option>
</select>
<br><br>

<label for="q2">2. AI Scripting in Game Engines</label>
<select id="q2" name="q2" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Applicable</option>
    <option value="2">Beginner</option>
    <option value="3">Average</option>
    <option value="4">Proficient</option>
    <option value="5">Expert</option>
</select>
<br><br>

<label for="q3">3. Database Design and Architecture</label>
<select id="q3" name="q3" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Applicable</option>
    <option value="2">Beginner</option>
    <option value="3">Average</option>
    <option value="4">Proficient</option>
    <option value="5">Expert</option>
</select>
<br><br>

<label for="q4">4. Circuit Design</label>
<select id="q4" name="q4" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Applicable</option>
    <option value="2">Beginner</option>
    <option value="3">Average</option>
    <option value="4">Proficient</option>
    <option value="5">Expert</option>
</select>
<br><br>

<label for="q5">5. Power BI or Tableau</label>
<select id="q5" name="q5" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Applicable</option>
    <option value="2">Beginner</option>
    <option value="3">Average</option>
    <option value="4">Proficient</option>
    <option value="5">Expert</option>
</select>
<br><br>

<label for="q6">6. Vulnerability Assessment Tools (e.g., Metasploit)</label>
<select id="q6" name="q6" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Applicable</option>
    <option value="2">Beginner</option>
    <option value="3">Average</option>
    <option value="4">Proficient</option>
    <option value="5">Expert</option>
</select>
<br><br>

<label for="q7">7. Machine Learning Algorithms</label>
<select id="q7" name="q7" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Applicable</option>
    <option value="2">Beginner</option>
    <option value="3">Average</option>
    <option value="4">Proficient</option>
    <option value="5">Expert</option>
</select>
<br><br>

<label for="q8">8. Storyboarding and Writing</label>
<select id="q8" name="q8" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Applicable</option>
    <option value="2">Beginner</option>
    <option value="3">Average</option>
    <option value="4">Proficient</option>
    <option value="5">Expert</option>
</select>
<br><br>

<label for="q9">9. System Troubleshooting</label>
<select id="q9" name="q9" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Applicable</option>
    <option value="2">Beginner</option>
    <option value="3">Average</option>
    <option value="4">Proficient</option>
    <option value="5">Expert</option>
</select>
<br><br>

<label for="q10">10. Cloud Threat Assessment</label>
<select id="q10" name="q10" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Applicable</option>
    <option value="2">Beginner</option>
    <option value="3">Average</option>
    <option value="4">Proficient</option>
    <option value="5">Expert</option>
</select>
<br><br>

<label for="q11">11. Robot Operating Systems (ROS)</label>
<select id="q11" name="q11" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Applicable</option>
    <option value="2">Beginner</option>
    <option value="3">Average</option>
    <option value="4">Proficient</option>
    <option value="5">Expert</option>
</select>
<br><br>

<label for="q12">12. Statistical Analysis</label>
<select id="q12" name="q12" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Applicable</option>
    <option value="2">Beginner</option>
    <option value="3">Average</option>
    <option value="4">Proficient</option>
    <option value="5">Expert</option>
</select>
<br><br>

<h2>Section 2: Interests (Areas of Focus or Curiosity)</h2>

<label for="q13">13. Pathfinding Algorithms (e.g., A*)</label>
<select id="q13" name="q13" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Interested</option>
    <option value="2">Slightly Interested</option>
    <option value="3">Moderately Interested</option>
    <option value="4">Highly Interested</option>
    <option value="5">Extremely Interested</option>
</select>
<br><br>

<label for="q14">14. Cloud Architecture</label>
<select id="q14" name="q14" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Interested</option>
    <option value="2">Slightly Interested</option>
    <option value="3">Moderately Interested</option>
    <option value="4">Highly Interested</option>
    <option value="5">Extremely Interested</option>
</select>
<br><br>

<label for="q15">15. World-Building</label>
<select id="q15" name="q15" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Interested</option>
    <option value="2">Slightly Interested</option>
    <option value="3">Moderately Interested</option>
    <option value="4">Highly Interested</option>
    <option value="5">Extremely Interested</option>
</select>
<br><br>

<label for="q16">16. Malware Analysis</label>
<select id="q16" name="q16" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Interested</option>
    <option value="2">Slightly Interested</option>
    <option value="3">Moderately Interested</option>
    <option value="4">Highly Interested</option>
    <option value="5">Extremely Interested</option>
</select>
<br><br>

<label for="q17">17. Excel and Data Cleaning</label>
<select id="q17" name="q17" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Interested</option>
    <option value="2">Slightly Interested</option>
    <option value="3">Moderately Interested</option>
    <option value="4">Highly Interested</option>
    <option value="5">Extremely Interested</option>
</select>
<br><br>

<label for="q18">18. SQL Query Optimization</label>
<select id="q18" name="q18" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Interested</option>
    <option value="2">Slightly Interested</option>
    <option value="3">Moderately Interested</option>
    <option value="4">Highly Interested</option>
    <option value="5">Extremely Interested</option>
</select>
<br><br>

<label for="q19">19. Ethical Hacking Techniques</label>
<select id="q19" name="q19" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Interested</option>
    <option value="2">Slightly Interested</option>
    <option value="3">Moderately Interested</option>
    <option value="4">Highly Interested</option>
    <option value="5">Extremely Interested</option>
</select>
<br><br>

<label for="q20">20. Mechanical Prototyping</label>
<select id="q20" name="q20" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Interested</option>
    <option value="2">Slightly Interested</option>
    <option value="3">Moderately Interested</option>
    <option value="4">Highly Interested</option>
    <option value="5">Extremely Interested</option>
</select>
<br><br>

<label for="q21">21. Customer Communication</label>
<select id="q21" name="q21" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Interested</option>
    <option value="2">Slightly Interested</option>
    <option value="3">Moderately Interested</option>
    <option value="4">Highly Interested</option>
    <option value="5">Extremely Interested</option>
</select>
<br><br>

<label for="q22">22. Deep Learning</label>
<select id="q22" name="q22" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Interested</option>
    <option value="2">Slightly Interested</option>
    <option value="3">Moderately Interested</option>
    <option value="4">Highly Interested</option>
    <option value="5">Extremely Interested</option>
</select>
<br><br>

<label for="q23">23. Microcontrollers and Field-Programmable Gate Array (FPGA)</label>
<select id="q23" name="q23" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Interested</option>
    <option value="2">Slightly Interested</option>
    <option value="3">Moderately Interested</option>
    <option value="4">Highly Interested</option>
    <option value="5">Extremely Interested</option>
</select>
<br><br>

<label for="q24">24. Data Visualization</label>
<select id="q24" name="q24" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Not Interested</option>
    <option value="2">Slightly Interested</option>
    <option value="3">Moderately Interested</option>
    <option value="4">Highly Interested</option>
    <option value="5">Extremely Interested</option>
</select>
<br><br>

<h2>Section 3: Knowledge (Concepts or Theoretical Understanding)</h2>

<label for="q25">25. Character Development</label>
<select id="q25" name="q25" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Unfamiliar</option>
    <option value="2">Basic Knowledge</option>
    <option value="3">Moderate Knowledge</option>
    <option value="4">Advanced Knowledge</option>
    <option value="5">Mastery</option>
</select>
<br><br>

<label for="q26">26. Penetration Testing Reporting</label>
<select id="q26" name="q26" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Unfamiliar</option>
    <option value="2">Basic Knowledge</option>
    <option value="3">Moderate Knowledge</option>
    <option value="4">Advanced Knowledge</option>
    <option value="5">Mastery</option>
</select>
<br><br>

<label for="q27">27. Big Data Tools (e.g., Hadoop, Spark)</label>
<select id="q27" name="q27" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Unfamiliar</option>
    <option value="2">Basic Knowledge</option>
    <option value="3">Moderate Knowledge</option>
    <option value="4">Advanced Knowledge</option>
    <option value="5">Mastery</option>
</select>
<br><br>

<label for="q28">28. Control Systems</label>
<select id="q28" name="q28" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Unfamiliar</option>
    <option value="2">Basic Knowledge</option>
    <option value="3">Moderate Knowledge</option>
    <option value="4">Advanced Knowledge</option>
    <option value="5">Mastery</option>
</select>
<br><br>

<label for="q29">29. Data Security and Compliance</label>
<select id="q29" name="q29" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Unfamiliar</option>
    <option value="2">Basic Knowledge</option>
    <option value="3">Moderate Knowledge</option>
    <option value="4">Advanced Knowledge</option>
    <option value="5">Mastery</option>
</select>
<br><br>

<label for="q30">30. Identity and Access Management (IAM)</label>
<select id="q30" name="q30" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Unfamiliar</option>
    <option value="2">Basic Knowledge</option>
    <option value="3">Moderate Knowledge</option>
    <option value="4">Advanced Knowledge</option>
    <option value="5">Mastery</option>
</select>
<br><br>

<label for="q31">31. Network Configuration</label>
<select id="q31" name="q31" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Unfamiliar</option>
    <option value="2">Basic Knowledge</option>
    <option value="3">Moderate Knowledge</option>
    <option value="4">Advanced Knowledge</option>
    <option value="5">Mastery</option>
</select>
<br><br>

<label for="q32">32. Behavior Trees</label>
<select id="q32" name="q32" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Unfamiliar</option>
    <option value="2">Basic Knowledge</option>
    <option value="3">Moderate Knowledge</option>
    <option value="4">Advanced Knowledge</option>
    <option value="5">Mastery</option>
</select>
<br><br>

<label for="q33">33. Data Interpretation</label>
<select id="q33" name="q33" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Unfamiliar</option>
    <option value="2">Basic Knowledge</option>
    <option value="3">Moderate Knowledge</option>
    <option value="4">Advanced Knowledge</option>
    <option value="5">Mastery</option>
</select>
<br><br>

<label for="q34">34. Data Preprocessing</label>
<select id="q34" name="q34" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Unfamiliar</option>
    <option value="2">Basic Knowledge</option>
    <option value="3">Moderate Knowledge</option>
    <option value="4">Advanced Knowledge</option>
    <option value="5">Mastery</option>
</select>
<br><br>

<label for="q35">35. Very Large Scale Integration (VLSI Design)</label>
<select id="q35" name="q35" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Unfamiliar</option>
    <option value="2">Basic Knowledge</option>
    <option value="3">Moderate Knowledge</option>
    <option value="4">Advanced Knowledge</option>
    <option value="5">Mastery</option>
</select>
<br><br>

<label for="q36">36. Incident Response</label>
<select id="q36" name="q36" required>
    <option value="" disabled selected>Choose your answer</option>
    <option value="1">Unfamiliar</option>
    <option value="2">Basic Knowledge</option>
    <option value="3">Moderate Knowledge</option>
    <option value="4">Advanced Knowledge</option>
    <option value="5">Mastery</option>
</select>
<br><br>

<input type="submit" value="Submit">
    </form>
</body>
</html>
