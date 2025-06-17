# Rwanda Driving License (RDL) Web Application

## Overview

The **Rwanda Driving License (RDL)** is an institution responsible for issuing **Provisional** and **Definitive Driving Licenses**. Located in **Kigali City, Nyarugenge District**, RDL has historically relied on a **paper-based system** to manage candidates' driving license results. This has led to challenges such as:

- Files being lost or damaged.
- Lack of efficient access to candidate data.
- Difficulty tracking and updating records.

To solve this, RDL decided to digitize their system by hiring a web developer to create a **web-based application** that stores and manages candidates’ information securely and efficiently.

---

## Features

- ✅ **Admin Registration and Login** (Session-based authentication)
- 🧑‍💼 **Admin Dashboard**
- 👥 **Candidate Management**
  - Add new candidates
  - Edit candidate information
  - Delete candidate records
  - View all candidates
- 📝 **Grade Management**
  - Record exam results for candidates
  - Automatically determine Pass/Fail (Pass: ≥ 12/20)
- 📊 **Exam Report View**
  - Display results and decisions
- 🔐 **Secure Session Handling**

---

## Database Design

**Database Name:** `RDL`

### Tables:

#### `Admin`
- `AdminId` (Primary Key)
- `AdminName`
- `Password`

#### `Candidate`
- `CandidateNationalId` (Primary Key)
- `FirstName`
- `LastName`
- `Gender`
- `DOB`
- `ExamDate`
- `PhoneNumber` (Unique Key)

#### `Grade`
- `CandidateNationalId` (Foreign Key)
- `LicenseExamCategory`
- `ObtainedMarks/20`
- `Decision` (Pass/Fail based on score)

---

## Technologies Used

- **Backend:** Laravel (PHP Framework)
- **Frontend:** Blade Templates, HTML, Tailwind CSS
- **Database:** MySQL
- **Session Handling:** Laravel's session system
- **Authentication:** Custom session-based admin login

---

## Setup Instructions

1. **Clone the repository**

```bash
git clone https://github.com/byiringiro aime fils/rdl-driving-license.git
cd rdl-driving-license
