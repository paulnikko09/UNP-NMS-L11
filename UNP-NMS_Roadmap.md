
# UNP-NMS Project Roadmap

## ✅ Phase 1: Project Setup & Environment Configuration (Complete)
- [x] Initialize Laravel project
- [x] Configure `.env`, database, Laravel basics
- [x] Setup Composer, NPM, Vite, TailwindCSS
- [x] Add essential Laravel packages (Spatie, Filament, etc.)

## ✅ Phase 2: Database Design & Seeding (Complete)
- [x] Create migrations for networks, devices, device_logs, users
- [x] Seed default admin user (via `AdminUserSeeder`)
- [x] Seed example network entries (`DatabaseSeeder`)
- [x] Build logic to relate users to discovered devices

## ⚙️ Phase 3: Core Feature – Network Discovery (In Progress)
- [x] Add Artisan commands for discovery (`PollDevices`, `DiscoverNetwork`)
- [ ] Finalize `DiscoverNetwork.php` and `PollDevices.php`
- [ ] Enhance device discovery: ICMP ping, SNMP probe, unmanaged fallback
- [ ] Log new/updated devices into database

## ⚙️ Phase 4: Web Dashboard (Filament UI) (In Progress)
- [ ] Add Filament Admin panel
- [ ] Create views for:
  - Network topology
  - Device list
  - Device logs/status
- [ ] Add device detail view with polling history
- [ ] Show up/down status using Tailwind components

## ⏳ Phase 5: Scheduled Tasks & Monitoring
- [ ] Add Laravel Scheduler to auto-run discovery/polling
- [ ] Store ping/SNMP responses
- [ ] Set thresholds (timeouts, retries, failure count)

## ⏳ Phase 6: Notifications & Alerts
- [ ] Add Laravel Notifications (email/SMS/Telegram)
- [ ] Trigger alerts for:
  - Offline devices
  - Unexpected responses (e.g., SNMP errors)
  - New devices discovered

## ⏳ Phase 7: Role Management & Permissions
- [ ] Use `spatie/laravel-permission`
- [ ] Define roles: Admin, Operator, Viewer
- [ ] Assign users to specific networks/devices

## ⏳ Phase 8: Optimization & Security
- [ ] Secure Artisan commands and scheduler
- [ ] Add API token-based access (if exposing endpoints)
- [ ] Optimize queries & cache frequent data

## ⚠️ Phase 9: Documentation & Testing
- [ ] Finalize README setup guide
- [ ] Add PHPUnit test coverage
- [ ] Write integration tests for:
  - Network discovery
  - Device polling
  - Dashboard UI

## ⏳ Phase 10: Deployment
- [ ] Prepare Docker/VPS deployment
- [ ] Setup Supervisor for jobs/scheduling
- [ ] Monitor logs via Laravel Telescope or custom view
- [ ] Harden `.env` and queue settings
