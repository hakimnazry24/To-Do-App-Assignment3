# Laravel Authentication Enhancement - Assignment Summary

This project enhances Laravel's default authentication system with several security and usability features including Multi-Factor Authentication (MFA), strong password hashing, rate limiting, and password salting.

---

## 🔐 Features Implemented

### ✅ 1. Multi-Factor Authentication (MFA) via Email
- Implemented using **Laravel Fortify**.
- After login, users are required to enter a 6-digit verification code sent to their email.
- 2FA code is stored temporarily in the database (`two_factor_code`, `two_factor_expires_at`).
- A Mailable (`TwoFactorCodeMail`) was created to handle the email notification.

### ✅ 2. Strong Password Hashing
- Laravel’s default `Hash::make()` is used.
- Hashing driver is configurable via `.env`:
  - **Bcrypt** (default)

### ✅ 3. Rate Limiting (Max 3 Failed Login Attempts)
- Implemented using Laravel's **RateLimiter** facade.
- Limits login attempts to 3 per minute per `email + IP`.
- Blocked requests return a `429 Too Many Attempts` response with a custom error message.

### ✅ 4. Password Salting
- Random 16-character salt is generated and stored in a new `salt` column in the `users` table.
- During registration:
  - Password is concatenated with the salt and then hashed.
- During login:
  - Password + user's salt is checked against the hashed password.

---

## 🛠️ Technical Implementation

### Database Changes
Added the following columns to the `users` table:
- `salt` – stores random string used for salting password.
- `two_factor_code` – stores generated 2FA code.
- `two_factor_expires_at` – expiration timestamp for 2FA code.

### Mail
- Created `App\Mail\TwoFactorCodeMail`.
- Email view: `resources/views/emails/two_factor_code.blade.php`.
- Uses Laravel's Mail system to send 2FA code to the user’s email.

### Fortify Customization
- Customized authentication logic in `FortifyServiceProvider`:
  - Salting logic integrated into login verification.
  - Rate limiter registered for login attempts.
  - 2FA verification enforced manually.

---

