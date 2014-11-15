# FEEDBACK DATABASE DOCUMENTATION

NOTE: Still editing.

### Convention:
1. Word in capital letter is entity.
2. // is used for comments.

### BUSINESS RULES

* The persons which are filling feedback form are STUDENT.
Adding the supplementary table for feedback but are main table for other modules.

### Tables :
1. COURSE
2. SUBJECT
3. BATCH
4. TIME TABLE
5. ACADEMIC ASSESSMENT INFO
6. INFRASTRUCTURE SUPPORT INFO 
7. FACULTY TABLE
8. USER MASTER TABLE
9. STUDENT INFO TABLE

### 1. COURSE :
- course_id                                            // the unique course id
- course_name                                          // The course name (MCA, MTECH, MBA(MS, FT, APR, TA), B.com )
- stream                                               // The stream (CS or MGM)
- number_of_sem                                        // The total number of semester

### 2. SUBJECT :
- subject_id                                           // Unique Subject ID
- course_id                                            // Course id from course table
- name_of_subject                                      // Name of the subject
- semester                                             // The semester in which it is taught
- credits                                              // The credits of that particular subjects

### 3. BATCH :
- batch_id                                             // The batch id of the batch like (IC-2K9, IM-2K7) and composite primary key
- course_id                                            // The course Id from the course table
- session                                              // The year of the batch like (2009, 2007 )
- section                                              // The section values (A, B, C, Nil) and composite primary key 

### 4. TIME TABLE :
- s_no                                                 // The unique no. 
- course_id                                            // The course id from the course table to know the course name (foreign key)
- subject_id                                           // The subject id from subject table to know subject name (foreign key)
- faculty_id                                           // The faculty_id from faculty_table to know name (foreign key)
- batch_id                                             // batch_id from batch table (foreign key)
- year                                                 // The year in which the subject is being taught
- section                                              // Sections value (A, B ,C Nil )
- day                                                  // The day of the week
- time_from                                            // The starting time of class
- time_to                                              // The ending time of class
- room_number                                          // The room number of the class

### 5. ACADEMIC ASSESSMENT INFO :
- s_no                                                 // The serial number unique
- student_no                                           // The foreign key from user_master table 
- subject_id                                           // Subject for which following data is entered 
- faculty_id                                           // faculty for which following data is entered
- conceptual_clarity                                   // specifies teacher's ability to bring conceptual clarity
- subject_knowledge                                    // specifies teacher's subject knowledge
- practicl_example                                     // specifies teacher's compliments theory with practical example
- handling_capability                                  // specifies teacher's capability of handling cases/ assignment/ exercises/ activities
- motivation                                           // specifies motivation provided by teacher
- control_ability                                      // specifies teacher's ability to control the teacher
- course_completion                                    // specifies completion & coverage of course
- communication_skill                                  // specifies teacher's communication skill
- regularity_punctuality                               // specifies teacher's regularity & punctuality
- outside_guidance                                     // specifies teacher's guidance & interaction outside the classroom
- syllabus_industry_relevance                          // specifies relevance of syllabus as per industry requirement
- sufficiency_of_course                                // specifies sufficiency of course content
- suggeestion_for_suject                               // specifies suggestion regarding subject (can be null)
- suggestion_for_course                                // specifies suggestion regarding course (can be null)

### 6. INFRASTRUCTURE SUPPORT INFO
- s_no                                                 // The serial number unique
- student_no                                           // The foreign key from user_master table
- books_availability                                   // specifies availability of books in library
- basic_requirements                                   // specifies requirements like chalk, duster
- technological_support                                // specifies supports like OHP/LCD etc
- study_material                                       // specifies availability of material like photocopy etc
- resourse_availability                                // specifies availability of resources like internet, computers, softwares,   database etc
- cleaniliness_of_class                                // specifies cleaniliness in the classroom 

### 7. FACULTY TABLE
- User_Id                                              // The unique faculty_id 
- name                                                 // The name of faculty
- Qualification                                        // The qualification of faculty
- DOB                                                  // Date of birth of faculty
- Email                                                // The email id of faculty
- Discipline                                           // The faculty discipline either computer or management
- Responsibility                                       // The faculty’s work responsibility like batch mentor, program in-charge
- Designation                                          // The faculty designation like professor, editor
- Gender                                               // The faculty gender
- Area_of_interest                                     // Faculty’s area of interest
- Contact_Number                                       // Faculty’s contact number
- Type 
- Status

### 8. USER MASTER TABLE
- student_no                                           // The unique student number (auto-incremented)
- First_Name                                           // User's first name
- Mid_name                                             // User's mid name 
- Last_Name                                            // User's last name (sirname)
- Father_Name                                          // User's father name
- Mother_Name                                          // User's mother name
- Bmonth                                               // User's month of birth
- Bdate                                                // User's date of birth
- Byear                                                // User's date of year
- Gender                                               // User's gender (male or female)
- Category                                             // User's category (OBC, General, SC, ST)
- Mobile_Number                                        // User's mobile number
- Telephone_Number                                     // User's telephone number (can be NULL)
- Email                                                // (Domain specific email) This is another identity of user. Ex: username@iips.edu.in (At present can be NULL since it is not allocated yet)
- Current_Address                                      // User's current address
- Permanent_Address                                    // User's permanent address
- Type                                                 // Type of user like student, faculty, staff, alumni, admin
- Status                                               // Status of user whether he is active(1) in the system or not(0)

### 9. STUDENT INFO TABLE
- s_no                                                 // The unique serial number
- student_no                                           // The foreign key from user_master table
- High_School_Name                                     // Student's high school name
- Year_Of_Passing                                      // Student's year of passing of high school
- Higher_Secondary_School_Name                         // Student's higher secondary school name
- Year_Of_Passing1                                     // Student's year of passing of higher secondary school
- Enrollment_Number                                    // Student's enrollment number
- Roll_Number                                          // Student's roll number
- Current_Course                                       // Student's current course
- Current_Sem                                          // Student's current semester
- Current_section                                      // Student's current section
- Enrollment_Year                                      // Student's enrollment number
- Alternate_Email                                      // Student's alternate email other than IIPS specific domain


