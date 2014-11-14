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
- course_id                                            // The course id from the course table to know the course name
- subject_id                                           // The subject id from subject table to know subject name
- faculty_id                                           // The faculty_id from faculty_table to know name
- batch_id                                             // batch_id from batch table
- year                                                 // The year in which the subject is being taught
- section                                              // Sections value (A, B ,C Nil )
- day                                                  // The day of the week
- time_from                                            // The starting time of class
- time_to                                              // The ending time of class
- room_number                                          // The room number of the class

### 5. ACADEMIC ASSESSMENT INFO :
- s_no                                                 // The serial number unique
- student_no                                           // The foreign key 
- subject_id                                           // Unique Subject ID 
- faculty_id                                           // Unique faculty ID
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
- suggeestion_for_suject                               // specifies suggestion regarding subject
- suggestion_for_course                                // specifies suggestion regarding course

### 6. INFRASTRUCTURE SUPPORT INFO
- s_no                                                 // The serial number unique
- student_no                                           // The foreign key 
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

