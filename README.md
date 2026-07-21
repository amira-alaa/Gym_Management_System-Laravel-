<div align="center">

# 💪 GYM Management System

[![Laravel](https://img.shields.io/badge/Laravel-9.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-8.0-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Sanctum](https://img.shields.io/badge/Sanctum-3.3-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/docs/9.x/sanctum)
[![Docker](https://img.shields.io/badge/Docker-Sail-2496ED?style=for-the-badge&logo=docker&logoColor=white)](https://laravel.com/docs/9.x/sail)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

**A comprehensive gym management web application built with Laravel 9, featuring member management, trainer scheduling, membership plans, session tracking, OTP login, and a RESTful API with Sanctum authentication.**

</div>

---

## 🌟 Overview

GYM Management System is a full-featured web application designed to streamline gym and fitness center operations. It provides an intuitive web interface for staff to manage members, trainers, membership plans, and training sessions — all from a single dashboard. The system also exposes a **RESTful API** secured with Laravel Sanctum, enabling mobile app integration and third-party connectivity.

Built with **Laravel 9** and **MySQL**, the application follows Laravel's MVC architecture with dedicated controllers for each domain entity. It features **OTP (One-Time Password) login** for enhanced security, member health record tracking, session scheduling with upcoming and ongoing session views, and plan status management. The project uses **Laravel Sail** for Docker-based development, ensuring a consistent environment across all machines.

Whether you're running a small fitness studio or a large gym chain, this system provides the tools to efficiently manage day-to-day operations, track member activity, and monitor trainer schedules.

---

## ✨ Features

### 👤 Member Management
- Full CRUD operations for gym members
- Member health record tracking (medical data, fitness metrics)
- View individual health record details per member
- Member deletion with confirmation
- Member search and listing

### 🏋️ Trainer Management
- Full CRUD operations for trainers
- Trainer assignment to sessions
- Trainer profile management
- Trainer deletion with confirmation

### 📋 Membership Plans
- Create and manage membership plans (e.g., Monthly, Quarterly, Annual)
- Activate and deactivate plans with status updates
- Plan listing with current status visibility
- Plan-specific pricing and duration settings

### 🎫 Memberships
- Enroll members into membership plans
- View all active memberships
- Cancel and delete memberships
- Track membership start and end dates

### 📅 Session Scheduling
- Full CRUD operations for training sessions
- Schedule sessions with assigned trainers
- Track **upcoming sessions** per member
- Track **ongoing sessions** in real time
- Session deletion with confirmation

### 🔐 Authentication & Security
- Traditional email/password login
- **OTP (One-Time Password) login** for enhanced security
- OTP resend functionality
- Laravel Sanctum API token authentication
- Protected routes with middleware (auth, auth:sanctum)
- Guest-only access for login and registration pages

### 📡 RESTful API
- Complete API for all management operations
- Sanctum token-based authentication
- Separate API controllers for clean separation
- Resource routes following REST conventions
- Health record data API endpoint

---

## 🏗️ Architecture

The application follows Laravel's **MVC (Model-View-Controller)** architecture with a clear separation between the web interface and the API layer. Each domain entity has its own Model, Controller, and database migration, following Laravel conventions.

```
┌──────────────────────────────────────────────────────────────────┐
│                         Client Layer                              │
│                                                                    │
│   ┌──────────────────────┐      ┌──────────────────────────┐     │
│   │    Web Browser        │      │    Mobile App / API       │     │
│   │  (Blade Templates)    │      │  (RESTful JSON API)       │     │
│   └──────────┬───────────┘      └──────────────┬───────────┘     │
└──────────────┼──────────────────────────────────┼─────────────────┘
               │                                  │
┌──────────────▼──────────────────────────────────▼─────────────────┐
│                      Laravel Application                           │
│                                                                    │
│   ┌──────────────────────┐      ┌──────────────────────────┐     │
│   │   Web Controllers     │      │   API Controllers         │     │
│   │  (Blade Views + Web   │      │  (JSON Responses +        │     │
│   │   Routes)             │      │   Sanctum Auth)           │     │
│   └──────────┬───────────┘      └──────────────┬───────────┘     │
│              │                                  │                  │
│   ┌──────────▼──────────────────────────────────▼───────────┐    │
│   │                  Business Logic Layer                     │    │
│   │        (Services, Validation, Authorization)              │    │
│   └──────────────────────────┬──────────────────────────────┘    │
│                              │                                     │
│   ┌──────────────────────────▼──────────────────────────────┐    │
│   │                   Data Access Layer                       │    │
│   │     (Eloquent ORM, Models, Migrations, Seeders)          │    │
│   └──────────────────────────┬──────────────────────────────┘    │
└──────────────────────────────┼────────────────────────────────────┘
                               │
┌──────────────────────────────▼────────────────────────────────────┐
│                        MySQL Database                              │
│    (Members, Trainers, Plans, Memberships, Sessions, Users)       │
└──────────────────────────────────────────────────────────────────┘
```

### Dual Interface Design

The application provides **two separate interfaces** sharing the same business logic and database:

| Interface | Purpose | Auth | Response |
|-----------|---------|------|----------|
| **Web** (Blade) | Staff dashboard & management | Session + OTP | HTML views |
| **API** (JSON) | Mobile app & integrations | Sanctum tokens | JSON |

---

## 🧰 Tech Stack

| Category               | Technology                                                                  |
|------------------------|-----------------------------------------------------------------------------|
| **Framework**          | ![Laravel 9](https://img.shields.io/badge/Laravel-9.x-FF2D20) Laravel 9    |
| **Language**           | ![PHP 8](https://img.shields.io/badge/PHP-8.0-777BB4) PHP 8.0+             |
| **Database**           | ![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1) MySQL               |
| **ORM**                | Eloquent ORM                                                                |
| **API Auth**           | ![Sanctum](https://img.shields.io/badge/Sanctum-3.3-FF2D20) Laravel Sanctum |
| **Frontend**           | Laravel UI (Blade + Bootstrap)                                              |
| **HTTP Client**        | Guzzle HTTP                                                                  |                                                         |
| **Testing**            | PHPUnit                                                                      |
| **Error Pages**        | Spatie Laravel Ignition                                                      |

---

## 🌐 Web Interface

The web interface provides a full dashboard for gym staff to manage all operations through Blade templates with Bootstrap styling.

### Web Routes

| Method | URL | Description | Auth |
|--------|-----|-------------|------|
| GET | `/` | Login page | Guest |
| POST | `/login` | Submit login | Guest |
| GET | `/OtpLogin` | OTP login form | Guest |
| POST | `/OtpLogin` | Verify OTP | Guest |
| GET | `/OtpLogin/resendOtp` | Resend OTP code | Guest |
| GET | `/register` | Registration page | Guest |
| POST | `/register` | Submit registration | Guest |
| GET | `/home` | Dashboard | Auth |
| POST | `/logout` | Logout | Auth |
| GET/POST | `/members` | Members CRUD | Auth |
| GET | `/members/healthRecord/{id}` | Member health record | Auth |
| GET | `/members/delete/{id}` | Delete member | Auth |
| GET/POST | `/plans` | Plans CRUD | Auth |
| PUT | `/plans/UPStatus/{id}` | Update plan status | Auth |
| GET/POST | `/memberships` | Memberships management | Auth |
| GET/POST | `/sessions` | Sessions CRUD | Auth |
| GET/POST | `/trainers` | Trainers CRUD | Auth |
| GET/POST | `/membersessions` | Member-Session tracking | Auth |

---

## 📡 API Endpoints

All API endpoints are prefixed with `/api/` and use JSON responses.

### 🔑 Authentication

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| POST | `/api/login` | Login and get Sanctum token | ❌ |
| POST | `/api/register` | Register a new user | ❌ |

### 🏠 Home

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| GET | `/api/home` | Get dashboard data | ✅ Sanctum |

### 👤 Members

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| GET | `/api/members` | List all members | ✅ Sanctum |
| POST | `/api/members` | Create a new member | ✅ Sanctum |
| GET | `/api/members/{id}` | Get member details | ✅ Sanctum |
| PUT/PATCH | `/api/members/{id}` | Update member | ✅ Sanctum |
| DELETE | `/api/members/{id}` | Delete member | ✅ Sanctum |
| GET | `/api/members/healthRecord/{id}` | Get member health record | ✅ Sanctum |

### 🏋️ Trainers

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| GET | `/api/trainers` | List all trainers | ✅ Sanctum |
| POST | `/api/trainers` | Create a new trainer | ✅ Sanctum |
| GET | `/api/trainers/{id}` | Get trainer details | ✅ Sanctum |
| PUT/PATCH | `/api/trainers/{id}` | Update trainer | ✅ Sanctum |
| DELETE | `/api/trainers/{id}` | Delete trainer | ✅ Sanctum |

### 📋 Plans

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| GET | `/api/plans` | List all plans | ✅ Sanctum |
| POST | `/api/plans` | Create a new plan | ✅ Sanctum |
| GET | `/api/plans/{id}` | Get plan details | ✅ Sanctum |
| PUT/PATCH | `/api/plans/{id}` | Update plan | ✅ Sanctum |
| DELETE | `/api/plans/{id}` | Delete plan | ✅ Sanctum |
| PUT | `/api/plans/UPStatus/{id}` | Update plan status | ✅ Sanctum |

### 🎫 Memberships

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| GET | `/api/memberships` | List all memberships | ✅ Sanctum |
| POST | `/api/memberships` | Create a new membership | ✅ Sanctum |
| DELETE | `/api/memberships/delete/{id}` | Delete membership | ✅ Sanctum |

### 📅 Sessions

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| GET | `/api/sessions` | List all sessions | ✅ Sanctum |
| POST | `/api/sessions` | Create a new session | ✅ Sanctum |
| GET | `/api/sessions/{id}` | Get session details | ✅ Sanctum |
| PUT/PATCH | `/api/sessions/{id}` | Update session | ✅ Sanctum |
| DELETE | `/api/sessions/{id}` | Delete session | ✅ Sanctum |
| GET | `/api/sessions/delete/{id}` | Delete session (alt) | ✅ Sanctum |

### 📊 Member Sessions

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| GET | `/api/membersessions` | List all member sessions | ✅ Sanctum |
| POST | `/api/membersessions` | Create member session | ✅ Sanctum |
| GET | `/api/membersessions/{id}` | Get member session details | ✅ Sanctum |
| PUT/PATCH | `/api/membersessions/{id}` | Update member session | ✅ Sanctum |
| DELETE | `/api/membersessions/{id}` | Delete member session | ✅ Sanctum |
| GET | `/api/membersessions/{id}/UpcomingSession/members` | Get upcoming sessions for member | ✅ Sanctum |
| GET | `/api/membersessions/{id}/OngoingSession/members` | Get ongoing sessions for member | ✅ Sanctum |

---

## 🔐 Authentication

The application provides two authentication systems — one for the web interface and one for the API.

### Web Authentication (Session + OTP)

The web interface supports **two login methods**:

#### 1. Email / Password Login
```
User navigates to / → enters email & password → authenticated via session
```

#### 2. OTP (One-Time Password) Login
```
User navigates to /OtpLogin → enters phone/email → receives OTP code
→ enters OTP → verified → authenticated via session
→ can resend OTP via /OtpLogin/resendOtp
```

### API Authentication (Sanctum Tokens)

The API uses **Laravel Sanctum** for stateless token-based authentication:

1. **Register** a new account:
   ```bash
   POST /api/register
   {
     "name": "John Doe",
     "email": "john@example.com",
     "password": "password123",
     "password_confirmation": "password123"
   }
   ```

2. **Login** to receive an API token:
   ```bash
   POST /api/login
   {
     "email": "john@example.com",
     "password": "password123"
   }
   ```

3. **Use the token** in subsequent requests:
   ```bash
   GET /api/members
   Authorization: Bearer <your-sanctum-token>
   ```

---

## 🧩 Core Modules

### Member Health Records

Each member has an associated health record that tracks medical data and fitness metrics. This allows trainers and staff to monitor member health and tailor training programs accordingly.

```
Member → hasOne → HealthRecord
                    ├── Medical conditions
                    ├── Fitness metrics
                    └── Emergency contact
```

### Plan Status Management

Membership plans have an activatable/deactivatable status, allowing administrators to control which plans are available for new enrollments. The `UPStatus` endpoint toggles plan availability.

```
Plan Status Flow:
  [Inactive] ──activate──▶ [Active] ──deactivate──▶ [Inactive]
```

### Session Tracking

The member-session relationship tracks which members attend which sessions, with real-time status tracking:

```
Session Timeline:
  [Scheduled] ──▶ [Upcoming] ──▶ [Ongoing] ──▶ [Completed]

Query Endpoints:
  • /membersessions/{id}/UpcomingSession/members  → Members in upcoming sessions
  • /membersessions/{id}/OngoingSession/members   → Members in ongoing sessions
```

---

<div align="center">

 If you found this project helpful, please give it a star!

</div>
