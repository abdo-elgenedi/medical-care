# Medical Care Application (Like Veseta Application)
## Application Features 
### Website
1. #### Searching
    1. Searching About Doctors By Location.
    2. Filter The Doctors By Specialists.
    3. The Doctor Card Contains.
       * Logo , Description , Specialist , Reviews , Reviews Count , Location , Feedback Count , Price.
       * View Profile , Add To Favourite And Book Appointment Button.
       * Add To Favourite Appeare Only When User Logged In.
2. #### View Profile Page
    1. Contains Logo , Description , Specialist , Reviews , Reviews Count , Location , Feedback Count , Price.
    2. Contains Each User Review And Feedback About This Doctor.
    3. Contains Doctor's Business Hours   
        1. Contain Day Name.
        2. Working Hours For Each Day.
        3. Status Of The Day At This Time (Available Or Not).
        4. Here You Can Write Your Review But When You Loggend In As User.
  3. #### Book Appointement Page 
     1. First You Must Be Logied In To Visit Book Appointement Page And Choose The Appointement
     2. You Will Find Calender For 14 Days Only
        1. Each Day Card Contains Day Name , Date And Working Hours At This Day.
        2. If The Day Is Available For This Doctor You Will Find Book Button.
        3. By Click Book Dialog Will Appear To Confirm The Appointment With You.
        4. Press Book From The Dialog To Receive Booking Success Message.
        5. **Note You Can't Book Appointments For The Same Doctor 2 Times At The Same Day.**
  4. #### User Dashboard Page
     1. Uppcoming Appointments
        1. Here You Find The Upcoming Appointments Contains.
            * Doctor's Logo , Name And Specialist.
            * Appointment Day , Date , Time , Amount , Status (Confirmed Or Cancelled).
     2. Past Appointments
        1. Here You Find The Past Appointments Contains.
            * Doctor's Logo , Name And Specialist.
            * Appointment Day , Date , Amount , Status (Confirmed Or Cancelled).
5. #### User Favourites Page
     1. Uppcoming Appointments
        1. Find The Doctors Which Put To Favourites.
            * Card Contains Doctor's Name , Logo , Specialist , Reviews , Location And Price .
            * Card Contains Book And View Profile Buttons.
 5. #### User Profile Settings And Chnage Password Page.
  
### Doctor Dashboard
  1. #### Home Page (Statisticals)
     * Count Of Patients , Today Appointements And PAst Appointments.
     * Can Manage Upcoming , Today , Past Appointments
  2. #### My Patients Page (Contains Patients Who Make Appointment With This Doctor At Any Time)
     * Patient Card Contains Image , Name , Location , Mobile , Age And Blood Group.
     * By Click Patient Name Doctor Will Be Redirected To The Patient Profile.
  3. #### Schedule Timming Page
     * All Week Days.
     * Each Day Contains Time , Capacity Of The Day And Day Status.
     * If The Day Contains Data Doctor Can Edit It At Any Time.
     * If The Day Didn't Caontains Any Data Doctor Can Add New Data For This Day.
  4. #### Reviews Page
     1. Can See All Patients Reviews.
     2. Review Card Contains Patient's Name , Rate , Comment And Review Time.
     3. By Click Patient Name Doctor Will Be Redirected To The Patient Profile.
  5. #### Previous Orders Page 
     * Can See Order Details.
  6. #### Profile And Change Password Page 
     * Can Change His Info And Status (Opened Closed). 
### Admin Dashboard
  1. #### Home Page (Statisticals)
     * Count Of All Doctors , All Patients , Appointments , Previous Orders And Revenue.
     * List Some Of Most Rated Doctors Contains Doctor's Image , Name , Speciality , Revenue And Rates.
     * List Some Of Most Reserve Patients Contains Patient's Image , Name , Phone , Appointments And Status.
  2. #### Appointments Page
     * List Of All Appointments With Serach.
     * Contains Doctor's Image , Name And Specialist.
     * Contains Patient's Image , Name.
     * Coantains Appointment's Date , Time , Status And Price.
     * Admin Can Edit Appointment Status At Any Time.  
  2. #### Regions Page
     * Add , Edit And Delete Regions Which Application Available At.  
  3. #### Specialties Page
     * Add , Edit And Delete Specialties Which Doctors Can Choose From.  
  4. #### Doctors Page
     * List Of All Doctors With Serach.
     * Contains Doctor's Image , Name , Member Since , Total Revenue , Status And Specialist.
     * Admin Can Block And Unblock Doctor At Any Time.
     * By Click Doctor Name Admin Will Watch Doctor Profile.
  5. #### Patients Page
     * List Of All Patients With Serach.
     * Contains Patient's ID , Image , Name , Age , Address , Mobile , Last Appointments And Status.
     * Admin Can Block And Unblock Patient At Any Time.
     * By Click Patient Name Admin Will Watch Patient Profile.
  6. #### Reviews Page
     * Contains Doctor's Image And Name.
     * Contains Patient's Name , And Image Who Review This Doctor.
     * Containts Review's Rate , Comment , Date And Time.
     * Admin Can Delete Any Review At Any Time.
  7. #### Profile And Change Password Page
  
  ### Notes:-
  **For Visiting Admin _/Admin/Dashboard_ Because Of Admin Folder In Public Will Cause Accessbility Error** 
  **In Main Project Folder There Is _medicalcare.sql_ Database Backup.**\
  #### Admin Credentials:-
  **_Username:abdoelgenedi@gmail.com._**\
  **_Password:12345678._**
  
   
