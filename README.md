# CRM System - Version 2

A comprehensive Customer Relationship Management system built with Laravel 11 and Jetstream, featuring full contact, deal, and interaction management capabilities.

## Description

Version 2 represents a major evolution from the experimental Node-based architecture to a fully-featured CRM system with dedicated models for Contacts, Deals, Interactions, and Contact Groups. This version introduces proper relational database design with Laravel Jetstream for robust authentication and team management.

## Tech Stack

- **Backend**: Laravel 11.9 (PHP 8.2+)
- **Frontend**: Livewire 3.0
- **UI**: Tailwind CSS
- **Authentication**: Laravel Jetstream 5.1 with Livewire
- **API**: Laravel Sanctum 4.0 for API authentication
- **Database**: SQLite/MySQL/PostgreSQL support
- **Build Tool**: Vite 5

## Key Features

- **Contact Management**: Complete CRUD operations for customer contacts
- **Deal Pipeline**: Track deals through various stages with amount tracking
- **Deal Stages**: Multi-stage deal progression system
- **Interactions**: Record and track all customer interactions
- **Contact Groups**: Organize contacts into groups with relationship management
- **User Assignment**: Assign deals and contacts to team members
- **Team Management**: Multi-user support with Jetstream teams
- **API Authentication**: Secure API access with Sanctum tokens
- **Real-time Updates**: Livewire-powered reactive UI

## Data Models

- **Contact**: Customer information and relationships
- **Deal**: Sales opportunities with amounts and status tracking
- **DealStage**: Stage progression for deals
- **Interaction**: Communication history
- **ContactGroup**: Group organization
- **ContactGroupRelationship**: Many-to-many relationships
- **User**: Team members with authentication

## Installation

1. Clone the repository:
```bash
git clone https://github.com/stukenov/crm-v2.git
cd crm-v2
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install JavaScript dependencies:
```bash
npm install
```

4. Copy the environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Create database:
```bash
touch database/database.sqlite
```

7. Run migrations:
```bash
php artisan migrate
```

8. Build assets:
```bash
npm run build
```

9. Start the development server:
```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

## Development

For local development with hot module replacement:

```bash
npm run dev
```

In a separate terminal:
```bash
php artisan serve
```

## Architecture

This version moves from the flexible but unstructured Node system to a proper relational database design:

- Contacts can have multiple Deals
- Deals can have multiple Stages
- Contacts can belong to multiple Groups
- All interactions are tracked with timestamps
- Users can be assigned to Deals

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

Copyright (c) 2025 Saken Tukenov

## Development Timeline

This is Version 2 (August 2024) - Major architectural refactoring with Jetstream integration and complete CRM functionality.
