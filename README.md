# E-Commerce-Website
E-Commerce- SAAS -->
    SAAS stands for Software as a Service
    , a cloud computing model that delivers ready-to-use software applications over the internet.

MVP- Minimum Viable Product ( building the first small step at a low risk to your wallet
                                 and business that you can test, refine, and grow step-by-step.)

USP- Unique Selling Point 

Roles & Responsibilities><

SuperAdmin->
    Develop & maintain the platform
    Manage Users 
    Onboarding Vendor By Verifying KYC 
    Manage Payment Gateway

Seller->
    Authentication/KYC--
        SignUp 
            UI 
                username
                password 
                confirm-password 
                usertype
                submit 
            API 
                read username and password 
                insert into user table 
            DB 
                create user table 
                    userid- int AI 
                    username- varchar(80)
                    password- varchar(100)
                    usertype- varchar(10)
                    created_date- timestamp default current_timestamp
        Login
    Manage Products--
        Create Products table 
            pid- auto incremt
            name-varchar(100)
            price-float
            details - text
            imgpath - varchar (100)
            owner - int
            created_date - current_timestamp

        Add 
        View 
        Edit 
        Delete
    Manage Orders--
        View
        Edit 
        Marked as Delivered

Buyers/Customers->
    Authentication
    View Products
    Compare Products
    Manage Cart 
        Add 
        View 
        Edit 
        Delete 
    Place Order 
        Payment Gateway
        COD 
    Cancel Order 
    Track Order 
    Review & Rating 
    Return 

Customer Care 
Delivery Partner 
Accountant
