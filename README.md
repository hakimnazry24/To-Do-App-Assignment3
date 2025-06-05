# Assignment 1 - Input Validation and Profile Page

## Overview

This assignment focuses on implementing secure input validation for user authentication and enhancing the user profile structure.

## What I Did

- Created three custom controllers:
  - `CustomLoginController`
  - `CustomRegisterController`
  - `CustomLogoutController`

- Implemented two **Form Request** classes:
  - `LoginRequest` – validates login inputs
  - `RegisterRequest` – validates registration inputs

## Validation Features

- Both form request classes enforce validation for:
  - `email` – must be a valid email format
  - `password` – must satisfy the following regex rule:
    - Minimum 8 characters
    - At least 1 uppercase letter
    - At least 1 lowercase letter
    - At least 1 special character

## User Model Enhancements

- Extended the `User` model to include the following new fields:
  - `nickname`
  - `avatar`
  - `phone_no`
  - `city`

- Updated the corresponding migration file to include these fields.

## Summary

The system now ensures robust input validation during login and registration, while supporting enhanced user profile information through database and model updates.
