# Accessible Hotel Booking Prototype

## Project Overview
BSc dissertation prototype. WCAG 2.2 AAA compliant hotel booking website.
Laravel 11 + Tailwind CSS + SQLite.

## Pages
1. Home/Search: search form with destination, dates, guests
2. Search Results: filtered hotel listings with sorting and pagination
3. Hotel Detail: photos, amenities, reviews, room options
4. Room Selection: select room, booking summary

## Database (SQLite)

### Hotels
name, slug, city, country, description, address, rating, price_from, stars, latitude, longitude, image_url

### Rooms
hotel_id, name, description, price_per_night, capacity, bed_type, image_url, amenities (JSON)

### Reviews
hotel_id, author, rating (1-10), comment, created_at

### Seeders
30-40 hotels across London, Paris, Barcelona, Rome, Tokyo, New York.
Realistic hotel names, descriptions, prices per city.
Use Unsplash image URLs for hotel and room images.
3-5 rooms per hotel with different types (Standard, Superior, Deluxe, Suite).
3-8 reviews per hotel with realistic comments and varied ratings.

## Laravel Patterns (important)

- Eloquent ORM with relationships:
  - Hotel hasMany Rooms
  - Hotel hasMany Reviews
  - Room belongsTo Hotel
  - Review belongsTo Hotel
- Route Model Binding using slug in controller methods
- Blade components: x-layout, x-hotel-card, x-room-card, x-search-form, x-review-card
- Resourceful routes
- Query scopes for filtering: scopeByCity, scopeByPrice, scopeByRating
- Accessors: formatted price, average rating
- Form Request for search validation
- Pagination on search results (12 per page)

## WCAG 2.2 AAA Compliance (CRITICAL)

### 1.1.1 Non-text Content (Level A)
- Every img tag MUST have descriptive alt text
- Decorative images use alt=""
- Icons have aria-label
- Alt text describes the content: "Luxury double room with king bed and city view" not "room photo"

### 1.4.6 Contrast Enhanced (Level AAA)
- Minimum 7:1 contrast ratio for normal text
- Minimum 4.5:1 for large text (18px+ or 14px bold+)
- Use these colour pairs:
  - Body text: #1a1a1a on #ffffff (16.15:1)
  - Secondary text: #404040 on #ffffff (9.73:1)
  - Links/accent: #0a4d8c on #ffffff (8.12:1)
  - Buttons: #ffffff on #0a4d8c (8.12:1)
  - Error text: #8b0000 on #ffffff (9.14:1)
  - Success text: #006400 on #ffffff (7.08:1)
- NEVER use light grey text on white, yellow text on white, or low contrast combinations

### 2.5.5 Target Size Enhanced (Level AAA)
- ALL clickable elements minimum 44x44px
- Buttons: min-h-[44px] min-w-[44px] px-6 py-3
- Links in navigation: min-h-[44px] with padding
- Checkboxes and radio buttons: styled to 44x44px
- Form inputs: min-h-[44px]
- Small icons that are clickable: wrapped in 44x44px touch target

### 2.4.13 Focus Appearance (Level AAA)
- All focusable elements get: focus:outline-3 focus:outline-offset-2 focus:outline-[#0a4d8c]
- Focus indicator must be visible on all backgrounds
- Skip to main content link: hidden until focused, then visible
- Tab order follows logical reading order
- No focus traps

## Additional Accessibility
- Skip to main content link as first focusable element
- Semantic HTML: header, nav, main, footer
- Headings in order: one h1 per page, h2, h3 etc
- ARIA landmarks where needed
- Form labels associated with inputs
- Error messages linked to form fields with aria-describedby
- Language attribute on html tag: lang="en"
- Page titles descriptive and unique per page

## Styling with Tailwind
- Clean, modern, professional design
- Responsive but optimised for 1920x1080 desktop
- Consistent spacing and typography
- Card-based layout for hotel listings
- Image gallery on hotel detail page
- Clear visual hierarchy

## README.md
Create a README that includes:
- Project introduction (WCAG 2.2 AAA accessible hotel booking prototype for BSc dissertation)
- Installation steps (composer install, npm install, cp .env.example .env, php artisan key:generate, touch database/database.sqlite, php artisan migrate --seed, npm run dev, php artisan serve)
- Tech stack (Laravel 11, Tailwind CSS, SQLite)
- MVC architecture explanation with code examples
- How each WCAG criterion is implemented with code samples
- The prototype uses seeded data to ensure consistent availability for evaluation. In a production environment, this would be replaced with a real hotel API such as Amadeus or Booking.com Affiliate API.
- Screenshots section (to be added later)
