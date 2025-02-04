    # Project Setup

This repository contains two main folders:
- `frontend/` - A React application.
- `backend/` - A Laravel application.

## Prerequisites
Make sure you have the following installed:
- **Node.js** (for React)
- **Composer** (for Laravel)
- **PHP & Laravel**
- **MySQL** 

---

## Backend Setup (Laravel)
1. Navigate to the backend folder:
   ```sh
   cd backend
   ```
2. Install dependencies:
   ```sh
   composer install
   ```
3. Copy the environment file and configure it:
   ```sh
   cp .env.example .env
   ```
4. Generate the application key:
   ```sh
   php artisan key:generate
   ```
5. Set up the database in `.env` and then run migrations:
   ```sh
   php artisan migrate
   ```
6. Serve the backend application:
   ```sh
   php artisan serve
   ```
   The backend should now be running on `http://127.0.0.1:8000`.

---

## Frontend Setup (React)
1. Navigate to the frontend folder:
   ```sh
   cd ../frontend
   ```
2. Install dependencies:
   ```sh
   npm install
   ```
3. Configure the API connection:
   - Open `frontend/src/services/api.ts`
   - Update the base URL to match your backend:
   ```ts
   const baseURL = "http://127.0.0.1:8000";
   ```
4. Start the frontend application:
   ```sh
   npm run dev
   ```
   The frontend should now be running at the provided local development server URL (usually `http://localhost:5173` or similar).

---

## Connecting Frontend to Backend
- Ensure both backend (`php artisan serve`) and frontend (`npm run dev`) are running.
- The frontend will now communicate with the backend via `http://127.0.0.1:8000`.
- Frontend should now be running on `http://127.0.0.1:5173`

I am available for anything additional needed.

