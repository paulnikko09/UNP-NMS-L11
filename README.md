# UNP-NMS - Network Monitoring System

A Laravel-based NMS with support for both managed and unmanaged devices, featuring GeoIP maps, alerts, polling, reporting, and remote device management.

---

## 🛠️ Developer Setup

### Prerequisites
- PHP 8.2+
- Composer
- MySQL / MariaDB
- Node.js + npm
- Laravel CLI
- GeoIP `.mmdb` (MaxMind)

### Installation

```bash
git clone https://your-repo-url.git
cd UNP-NMS
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
```

### Database Setup

```bash
php artisan migrate
php artisan db:seed
# OR import schema.sql manually
```

### Run the App

```bash
php artisan serve
```

### Scheduler and Queue

```bash
php artisan queue:work
php artisan schedule:work
```

### GeoIP Setup
- Register at https://dev.maxmind.com/
- Download and place `GeoLite2-City.mmdb` in `storage/app/`

---

## 📡 API Endpoints

| Method | Endpoint                 | Description                  | Auth |
|--------|--------------------------|------------------------------|------|
| GET    | `/api/map/devices`       | Return devices with GeoIP    | No   |
| GET    | `/api/dashboard/stats`   | Dashboard stats              | No   |
| GET    | `/api/devices`           | List all devices             | No   |
| POST   | `/api/devices/{id}/poll` | Trigger poll for a device    | Yes  |

---

## 📝 Deployment Tips
- Use Laravel Horizon for Redis queue.
- Use Supervisor to persist queue:work
- Secure your `.env` and GeoIP database
- Schedule backups of poll results, alerts, and reports

---

## 📂 Credits
Developed by: UNP-NMS Project Team
