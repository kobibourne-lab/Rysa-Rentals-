# RYSA Rentals 🚗

A web-based **car rental management system** built as a collaborative college web-development project. RYSA Rentals lets an internal user manage the full lifecycle of a rental business — companies, cars, car types, rental categories, bookings, blacklisted customers, and reporting — from a single navigation-driven back-office interface.

The application is written in **PHP** with a **MySQL** database, using server-rendered HTML pages, shared CSS, and client-side JavaScript for form validation.

> **Project name:** RYSA Rentals — named after the team (Ryan, Sarah + the wider group: Jessica & Kobi).

---

## 👥 The Team & Contributions

RYSA Rentals was built by a four-person team. Each member owned one or more functional *modules* of the system, developed in their own top-level folder, while a shared **Group** folder holds the common framework everyone's screens depend on.

| Member | Folder | Modules owned |
|--------|--------|---------------|
| **Jessica** | `Jess/` | Company file maintenance (Add / Amend / Delete) + the **Rentals booking flow** |
| **Kobi Bourne** | `Kobi/` | Rental Category maintenance (Add / Amend / Delete) + **Car Report** |
| **Ryan Mulcahy** | `Ryan/` | Car file maintenance (Add / Amend / Delete) + **Blacklist Report** |
| **Sarah Crotty** | `Sarah/` | Car Type set-up (Add / Amend / Delete) + **Company Report** |
| **Whole team** | `Group/` | Shared navigation, header, database connection, global styling, landing pages, and the system design diagram |

A detailed breakdown of both the **group work** and each person's **individual work** appears further down.

---

## 🛠️ Tech Stack

- **Backend:** PHP (procedural), MySQL via the `mysqli` extension
- **Frontend:** HTML5, CSS3 (shared `global.css` + `nav.css` + per-report stylesheets), vanilla JavaScript
- **Database:** MySQL database named `continental`
- **Server:** Any PHP-capable web server (Apache / the college web server); developed for deployment where the module folders sit at the site root

---

## ✨ Features

- **Company management** — add, view, amend, and delete rental companies (with credit-limit validation up to €9999).
- **Car management** — add, view, amend, and delete cars, linked to car types.
- **Car Type set-up** — maintain the catalogue of car types (manufacturer, model, version, engine size, fuel type).
- **Rental Category management** — add, view/amend, and delete rental categories.
- **Rentals booking flow** — select a company, select a car, and confirm a rental across a multi-step, session-driven journey.
- **Reporting** — Company Report, Car Report, and Blacklist Report, each with sorting options.
- **Blacklist** — reporting on blacklisted customers (full add/amend/delete menu is stubbed as *under construction*).
- **Shared navigation** — a collapsible sidebar menu with dropdowns, driven by a single `nav.php`.
- **Client-side validation** — each data-entry screen ships a companion `.js` file that validates input before submission.

---

## 🧭 Navigation & Menu Map

Navigation is centralised in **`Group/nav.php`**, which renders a fixed sidebar included on every screen. The menu structure is:

- **HOME** → landing page
- **Rentals** → rental booking flow (Jessica)
- **Rental Category** ▾
  - Add a New Rental Category (Kobi)
  - Delete a Rental Category (Kobi)
  - Rental Category View/Amend (Kobi)
- **Accept Payments** ▾
  - Payments *(under construction)*
- **Blacklist Menu** ▾
  - Add / Delete / View-Amend Blacklist Record *(all under construction)*
- **File Maintenance** ▾
  - Add / Delete / View-Amend **Company** (Jessica)
  - Add / Delete / View-Amend **Car** (Ryan)
- **Set-Up** ▾
  - Add / Delete / View-Amend **Car Type** (Sarah)
- **Reports** ▾
  - Company Reports (Sarah)
  - Car Reports (Kobi)
  - Rental Reports *(under construction)*
  - Blacklist Reports (Ryan)
- **Login** *(under construction)*

---

## 🏗️ Architecture & Conventions

The team followed a consistent set of patterns across every module, which makes the codebase easy to read despite four authors:

**1. The `.html.php` + `.php` pair.**
Most screens are split into two files:
- `X.html.php` — the **form / presentation** page the user sees.
- `X.php` — the **processing** page that receives the POST, validates server-side, talks to the database, and reports the result (with a "return" button back to the form).

**2. Shared includes.**
Every screen pulls in the common framework with relative includes:
```php
<link rel="stylesheet" href="../../GroupWork/global.css">
include('../../GroupWork/header.php');   // logo + title bar
include('../../GroupWork/nav.php');      // sidebar menu
include('../../GroupWork/db.inc.php');   // database connection
```

**3. The `listbox` pattern.**
Dropdowns are populated from the database by a small dedicated file (e.g. `listbox.php`, `carListBox.php`, `CompanyList.php`) that runs a `SELECT` and echoes `<option>` elements — keeping data access out of the presentation markup.

**4. Client-side validation.**
Each data-entry screen has a paired JavaScript file (`addCar.js`, `amendcarType.js`, `Valid.js`, `Company.js`, …) invoked via `onsubmit` to validate before the form is sent.

---

## 🗄️ Database

The application connects through a single shared file, **`Group/db.inc.php`**, which centralises the `mysqli_connect` call so individual screens never repeat connection code.

**Database:** `continental`

**Core tables referenced across the code:**
- `Company` — rental companies
- `Car` — individual cars
- `CarType` — car catalogue (manufacturer, model, version, engine size, fuel type)
- `RentalCat` — rental categories
- `Blacklist` — blacklisted customers

> ⚠️ **Security note:** `db.inc.php` now ships with **placeholder** credentials (good). However, `Group/DB info.txt` still contains real-looking login details committed to the repo. It's strongly recommended to remove that file and scrub it from git history, and to keep credentials out of version control entirely (e.g. via an untracked config file or environment variables). See *Known Issues*.

---

## 📁 Repository Structure

```
Rysa-Rentals-/
└── PROJECT - WEB/
    ├── Group/                     # Shared framework (whole team)
    │   ├── nav.php                # Sidebar navigation menu
    │   ├── nav.css
    │   ├── header.php             # Logo + title bar
    │   ├── global.css
    │   ├── db.inc.php             # MySQL connection
    │   ├── home.html.php          # Landing page
    │   ├── underConstruction.html.php
    │   ├── RentalSystemDiagram.png
    │   └── DB info.txt            # ⚠️ contains credentials
    │
    ├── Jess/                      # Jessica
    │   ├── ADD/                   # CompanyAdd
    │   ├── AMEND/                 # CompanyAmend + CompanyList
    │   ├── DELETE/                # CompanyDelete + CompanyListDel
    │   ├── RENTALS/               # Rental booking flow
    │   └── Company.js
    │
    ├── Kobi/                      # Kobi Bourne
    │   ├── AddScreen/             # AddRentalCat1 + Rentals.php + Valid.js
    │   ├── AmendViewScreen/       # AmendView + Amend.js + listbox
    │   ├── DeleteScreen/          # delete + listbox
    │   └── CarReport/             # CarReport
    │
    ├── Ryan/                      # Ryan Mulcahy
    │   ├── ADD/                   # addCar + addCar.js + listbox
    │   ├── AMEND/                 # carAmendView + amendCar.js + carListBox
    │   ├── DELETE/                # deleteCar + deleteCar.js + deleteListBox
    │   └── BLACKLIST REPORT/      # blacklistReport + blacklistReport.css
    │
    └── Sarah/                     # Sarah Crotty
        ├── ADD/                   # addcarType + addcarType.js
        ├── AMEND/                 # amendcarType + amendcarType.js
        ├── DELETE/                # deletecarType + deletecarType.js
        └── COMPANY REPORT/        # companyReport + companyReport.css
```

---

## 🤝 Group Work (shared framework)

The `Group/` folder is the backbone every module builds on. It was developed collaboratively and is the "glue" that makes four separately-authored modules feel like one application:

- **`nav.php`** — the single source of truth for the site menu. Renders the sidebar, its dropdowns, and the JavaScript that opens/closes them (only one dropdown open at a time; clicking outside closes them all).
- **`header.php`** — the RYSA Rentals title bar and logo, included at the top of every page.
- **`db.inc.php`** — one reusable MySQL connection, so no screen repeats connection logic.
- **`global.css` + `nav.css`** — the shared visual language (blue palette, sidebar layout, buttons) applied system-wide.
- **`home.html.php`** — the landing page; **`underConstruction.html.php`** — the placeholder used for features not yet implemented (Payments, Login, the Blacklist maintenance menu, Rental Reports).
- **`RentalSystemDiagram.png`** — the agreed system/design diagram.

This shared layer is why the individual modules can be dropped into the site and immediately share navigation, styling, and data access.

---

## 👤 Individual Work

### Jessica — Companies & Rentals (`Jess/`)
The largest functional area. Jessica built:
- **Company file maintenance:** `CompanyAdd`, `CompanyAmend` (with `CompanyList` populating the picker), and `CompanyDelete` (with `CompanyListDel`) — full create/read/update/delete on companies, with credit-limit validation.
- **The Rentals booking flow** (`RENTALS/`): a multi-step journey — `RentalSelCompany` → `CarSel` / `CompanySel` → `Rent` → `confirm` → `rentConfirm` — that walks the user through selecting a company and car and confirming a rental. This is the most stateful part of the system.
- **`Company.js`:** shared validation reused across the company and rental screens.

### Kobi Bourne — Rental Categories & Car Report (`Kobi/`)
- **Rental Category maintenance:** `AddRentalCat1` (with `Rentals.php` processing and `Valid.js` validation), `AmendView` (with `Amend.js` + `listbox`), and `delete` (with `listbox`) — managing the categories cars are rented under.
- **Car Report** (`CarReport/`): a reporting screen over the car fleet.
- Includes per-screen **AI Disclosure Forms** documenting tool usage.

### Ryan Mulcahy — Cars & Blacklist Report (`Ryan/`)
- **Car file maintenance:** `addCar` (+ `addCar.js`, `listbox`), `carAmendView` (+ `amendCar.js`, `carListBox`), and `deleteCar` (+ `deleteCar.js`, `deleteListBox`) — full CRUD on the car records, with cars linked to Sarah's car types via the `listbox` dropdowns.
- **Blacklist Report** (`BLACKLIST REPORT/`): a sortable report (`blacklistReport.php` + dedicated `blacklistReport.css`) over blacklisted customers, driven by a POST-back sort form.

### Sarah Crotty — Car Types & Company Report (`Sarah/`)
- **Car Type set-up:** `addcarType`, `amendcarType`, and `deletecarType` — each with its own `.js` validation — maintaining the catalogue (manufacturer, model, version, engine size, fuel type) that the Car module depends on.
- **Company Report** (`COMPANY REPORT/`): a sortable report (`companyReport.php` + dedicated `companyReport.css`) over the company records.

---

## 🚀 Getting Started

### Prerequisites
- A PHP-enabled web server (Apache, or the college web server)
- MySQL with a database named `continental` and the tables listed above
- The module folders served from the **site root** (see below)

### ⚠️ Important: deployment folder structure
The code navigates using **root-relative links** (e.g. `/GroupWork/home.html.php`, `/Jessica/RentalScreen/…`) and **relative includes** (`../../GroupWork/…`). These assume a specific set of folder names at the web root that **differ from the folder names in this repository**. Before the site will run, the folders must be deployed/renamed to match what the code expects:

| Repository folder | Must be deployed as |
|-------------------|---------------------|
| `Group/` | `GroupWork/` |
| `Jess/` | `Jessica/` |
| `Jess/RENTALS/` | `Jessica/RentalScreen/` |
| `Jess/ADD/` | `Jessica/AddCompany/` |
| `Jess/DELETE/` | `Jessica/DeleteCompany/` |
| `Jess/AMEND/` | `Jessica/AmendCompany/` |
| `Kobi/AddScreen/` | `Kobi/Add/` |
| `Kobi/DeleteScreen/` | `Kobi/Delete/` |
| `Kobi/AmendViewScreen/` | `Kobi/Amend/` |
| `Kobi/CarReport/` | `Kobi/CarReport/` *(already matches)* |
| `Ryan/ADD/` | `Ryan/Add/` |
| `Ryan/DELETE/` | `Ryan/Delete/` |
| `Ryan/AMEND/` | `Ryan/Amend/` |
| `Ryan/BLACKLIST REPORT/` | `Ryan/BlacklistReport/` |
| `Sarah/ADD/` | `Sarah/AddCarType/` |
| `Sarah/DELETE/` | `Sarah/DeleteCarType/` |
| `Sarah/AMEND/` | `Sarah/AmmendCarType/` |
| `Sarah/COMPANY REPORT/` | `Sarah/CompanyReport/` |

### Run
1. Deploy the folders under your web root using the names above.
2. Create the `continental` database and its tables, and set real credentials in `GroupWork/db.inc.php`.
3. Browse to `/GroupWork/home.html.php`.

---

## ✅ Navigation Verification Results

All navigation links, shared includes, JavaScript/CSS/image references, and inter-page redirects were checked against the actual files on disk.

**Summary:** The navigation scheme is **internally consistent and will work once deployed to the folder structure above** — but **it does not resolve against the repository's current folder names as-is**. Two things cause this:

1. **Shared-folder name mismatch (affects every screen).** Every page includes the framework via `../../GroupWork/…`, but the shared folder in the repo is named **`Group`**, not `GroupWork`. Until renamed, no screen can load the header, navigation, styles, or database connection.
2. **Menu targets use deployment folder names.** The links in `nav.php` point to `Jessica/…`, `Kobi/Add/…`, `Sarah/AddCarType/…`, etc., which differ from the on-disk `Jess/…`, `Kobi/AddScreen/…`, `Sarah/ADD/…`. See the rename table above for the full mapping.

**What works as-is:**
- Within-folder redirects (e.g. a `.php` processor returning to its own `.html.php` form) resolve correctly.
- The `Kobi/CarReport/` folder name already matches the menu.

**Discrete issues found (independent of folder layout):**

| Issue | Location | Impact |
|-------|----------|--------|
| Missing script file | `Kobi/CarReport/CarReport.html.php` references `<script src="amend.js">`, but no `amend.js`/`Amend.js` exists in that folder | Broken script include on the Car Report page |
| Empty processing file | `Kobi/DeleteScreen/delete.php` is 0 bytes | The Rental Category delete form posts to an empty handler |
| Stray empty file | `Kobi/CarReport/copy.html.php` is 0 bytes | Unused; safe to remove |
| Placeholder logo | `Group/RYSARentals.png` is a 2-byte placeholder referenced by `header.php` | Logo shows as a broken/empty image on every page |
| Case sensitivity | Names like `amend.js` vs `Amend.js` and `GroupWork` casing | Works on macOS/Windows (case-insensitive) but **will break on a Linux server** even after renaming — match casing exactly |
| Credentials in repo | `Group/DB info.txt` | Real-looking DB password committed to version control |

---

## 🧾 Known Issues / TODO

- [ ] Rename/deploy folders to the structure in *Getting Started* (or refactor links to relative paths so the repo runs without renaming).
- [ ] Add the missing `amend.js` (or fix the reference) in `Kobi/CarReport/CarReport.html.php`.
- [ ] Implement `Kobi/DeleteScreen/delete.php` (currently empty).
- [ ] Replace the placeholder `RYSARentals.png` logo with the real asset.
- [ ] Remove `Group/DB info.txt` and scrub credentials from git history.
- [ ] Build out the *under construction* areas: Payments, Login, and the full Blacklist maintenance menu (Add/Delete/View-Amend) and Rental Reports.
- [ ] Align file/folder casing for case-sensitive (Linux) hosting.

---

## 📄 Credits

Built by **Jessica, Kobi Bourne, Ryan Mulcahy, and Sarah Crotty** as a group web-development project (2026). Each module folder contains the author's own AI Disclosure documentation.
