# 📚 Distributed Book Ordering System (DBOS)

A fully functional web-based platform that enables users to browse, search, and order books online. The system follows a distributed database architecture across Dhaka, Rajshahi, and Chittagong branches to ensure real-time data availability, improved performance, and efficient inventory management.

---

## 🌟 Key Features
- User registration, login, and secure authentication  
- Browse books by category, author, or keyword  
- Search engine with real-time filtering  
- Add to cart, update quantity, and place orders  
- Order tracking and customer feedback  
- Admin panel for managing books, stock, users, and orders  
- Distributed database for multi-branch synchronization  

---

## 🖥️ System Overview
The DBOS modernizes traditional bookstore operations by replacing manual processes with an online, responsive, and scalable system. According to the project report :contentReference[oaicite:2]{index=2}, the system addresses inventory inconsistencies, lack of online access, and inefficient order processing found in current physical setups.

---

## 🧩 System Architecture
A three-tier architecture is used:

### 1. **Presentation Layer**
- User interface built with **HTML, CSS, JavaScript**
- Responsive pages for registration, book listing, categories, cart, and order details  
- Screenshots from pages 5–9 of the report :contentReference[oaicite:3]{index=3} show login, browsing, cart, and checkout interfaces.

### 2. **Logic Layer**
- Backend implemented in **PHP**
- Handles business logic, database queries, sessions, validation, and admin operations  

### 3. **Data Layer**
- Distributed **MySQL databases** across 3 branches  
- Each branch stores identical schemas: `book_info`, `cart`, `orders`, `confirm_order`, `msg`, etc.  
- Fragmented/replicated tables shown on page 17 of the report :contentReference[oaicite:4]{index=4}.

---

## ⚙️ Technologies Used
- **Frontend:** HTML, CSS, JavaScript  
- **Backend:** PHP  
- **Database:** MySQL (Distributed)  
- **Server:** XAMPP / LAMP  
- **Version Control:** Git  

---

## 🛠️ System Modules

### ✅ **User Features**
- Registration & Login (page 5–6)  
- Book browsing & category filters  
- Search by title, author, or keyword  
- Cart management  
- Order placement & confirmation  
- Order tracking & feedback submission  

### ✅ **Admin Features**
- Add/edit/delete books  
- Stock & inventory management  
- Approve or cancel customer orders  
- View delivery details  
- Generate reports (top-selling books, revenue, etc.)  

---

## 📊 Database Design
The DB schema includes core tables for users, books, orders, and cart.  
ER diagram and schema are shown on page 14 of the report :contentReference[oaicite:5]{index=5}.

Distributed database motivations:
- Fault tolerance  
- Faster regional access  
- Load balancing  
- Reduced single point of failure  

---

## 🔄 Development Methodology
The **Waterfall Model** was used (page 11).  
Steps include:
1. Requirement analysis  
2. System design (DFD, use case, ER diagram)  
3. Implementation  
4. Testing (unit + integration)  
5. Deployment  

Activity and use case diagrams are shown on pages 12–13 :contentReference[oaicite:6]{index=6}.

---

## 🧪 Testing
- **Unit Tests:** Login, registration, book CRUD, cart, checkout  
- **Integration Tests:** Cart → Order → Confirmation flow  
- **Results:** All tests passed successfully (page 18)  

---

## 📘 User Manual (Summary)
(From pages 19–20)
- Home: browse categories and featured books  
- Login: access cart, orders, and feedback  
- Ordering: add to cart → update quantity → checkout → confirm order  
- Payment: COD (future update—online payments)  
- Search: title, author, ISBN  
- Feedback: submit reviews  

---

## 🏁 Conclusion
- A complete and scalable distributed book ordering system  
- Improves customer experience and reduces manual errors  
- Supports multi-branch operations  
- Provides a strong foundation for future enhancements  

---

## 🚀 Future Enhancements
(From page 21)
- Mobile app for Android & iOS  
- Online payment integration  
- AI-based book recommendation system  
- Advanced analytics dashboard for admins  

---

## 📁 Suggested Folder Structure

