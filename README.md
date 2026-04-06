# StayNest: An Accessible Hotel Booking Platform

## Introduction

StayNest is a Laravel-based hotel booking prototype built as part of a dissertation investigating the "Law-Experience Gap" between technical accessibility compliance and real user experience across leading hotel booking platforms. This application demonstrates how WCAG 2.2 AAA accessibility standards can be effectively implemented in a functional web application whilst maintaining usability and intuitive design.

The prototype evaluates hotel booking workflows across four critical stages: the homepage, search results, hotel details, and room selection. By implementing accessibility-first principles from the ground up, StayNest serves both as a working application and as evidence of accessibility best practices in the hospitality technology sector.

## Project Scenario

StayNest addresses a significant gap in the hotel booking industry: while major platforms (Booking.com, Expedia, Trip.com) meet basic WCAG 2.1 AA compliance, they often fail to deliver a genuinely accessible experience for users with disabilities. Accessibility is not merely about passing automated tests; it is about ensuring all users, regardless of ability, can independently complete hotel bookings without frustration or barriers.

This project explores how an accessible-first approach influences design decisions, information architecture, and technical implementation. The prototype accommodates users with visual, motor, and cognitive disabilities whilst providing an experience that benefits all users through improved clarity, structure, and feedback.

## Technology Stack

- **Framework:** Laravel 11
- **Database:** MySQL / MariaDB
- **Frontend Styling:** Tailwind CSS (utility-first CSS framework providing pre-built classes for rapid, responsive design whilst maintaining semantic HTML)
- **Template Engine:** Blade (Laravel's templating syntax)
- **ORM:** Eloquent (Laravel's query builder)
- **Build Tool:** Vite
- **Languages:** PHP 8.2+, JavaScript (minimal, ES6+)

## WCAG 2.2 AAA Accessibility Standards

StayNest implements the following WCAG 2.2 Level AAA criteria across all booking stages:

### 1.1.1 Non-Text Content (Level A)
All images, icons, and visual elements include descriptive alt text. Images serving decorative purposes are marked with empty alt attributes. Icons without accompanying text receive aria-labels. This ensures screen reader users understand the purpose and context of every visual element.

**Example from the codebase:**
```blade
<img src="hotel-image.jpg" alt="The Plaza Hotel lobby with marble pillars and crystal chandeliers">
<i class="icon-star" aria-label="5-star rating"></i>
```

### 1.4.6 Contrast Enhanced (Level AAA)
All text meets a minimum contrast ratio of 7:1 (AAA standard) against its background. This extends beyond WCAG 2.1 AA (4.5:1) and ensures readability for users with low vision or colour blindness. Unlike platforms such as Booking.com that rely on brand colours (e.g., yellow #FFB700) that fail contrast requirements, StayNest prioritises user needs over brand aesthetics.

**Example:**
```blade
<span class="text-gray-900 bg-white">Text at 10.5:1 contrast</span>
```

### 2.5.5 Target Size Enhanced (Level AAA)
Interactive elements (buttons, form controls, links) are sized at minimum 48x48 CSS pixels, exceeding the AAA requirement. This accommodates users with motor disabilities and makes touch interactions reliable on all devices. All form inputs have large, visible labels and sufficient spacing.

**Example:**
```blade
<button class="px-6 py-3 min-h-12 min-w-12">Book Now</button>
<!-- Achieves 48x48px minimum even with padding adjustments -->
```

### 2.4.13 Focus Appearance (Level AAA)
All interactive elements display a clear, visible focus indicator when navigated via keyboard. The focus ring is not removed and has a minimum 2px outline with sufficient contrast. Users can navigate the entire application using only the Tab key and arrow keys.

**Example:**
```css
button:focus-visible {
  outline: 3px solid #0066cc;
  outline-offset: 2px;
}
```

## Installation Instructions

### Prerequisites

- PHP 8.2 or higher
- Composer (PHP dependency manager)
- Node.js 16+ and npm
- MySQL 8.0+ or MariaDB 10.4+

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/AinhoaItza/dissertation-accessible-hotel-booking.git
   cd dissertation-accessible-hotel-booking
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Create environment file**
   ```bash
   cp .env.example .env
   ```

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

6. **Configure database connection**
   Edit `.env` and set your database credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=staynest
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. **Run migrations and seeders**
   ```bash
   php artisan migrate --seed
   ```

   This command creates all necessary tables and populates the database with 26 hotel properties and associated rooms.

8. **Build frontend assets**
   ```bash
   npm run dev    # Development with watch mode
   npm run build  # Production build
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   ```

   The application runs at `http://localhost:8000`

## Project Structure

```
StayNest/
├── app/
│   ├── Models/          # Eloquent models (Hotel, Room, Booking, User)
│   ├── Http/
│   │   ├── Controllers/ # Business logic (HomeController, HotelController, etc.)
│   │   └── Requests/    # Form validation (StoreHotelRequest, SearchRequest)
│   └── Services/        # Business logic separated from controllers
├── database/
│   ├── migrations/      # Schema definitions (create_hotels_table, etc.)
│   ├── seeders/         # Data population (HotelSeeder, RoomSeeder)
│   └── factories/       # Model factories for testing
├── resources/
│   ├── views/           # Blade templates
│   │   ├── layouts/     # Master layout with accessible navigation
│   │   ├── pages/       # Page-specific templates (index, search, detail)
│   │   └── components/  # Reusable components (SearchForm, HotelCard, etc.)
│   └── css/             # Tailwind configuration and custom styles
├── routes/
│   └── web.php          # Route definitions
├── public/              # Publicly accessible assets (CSS, JS compiled)
└── tests/               # PHPUnit tests for accessibility validation
```

## The MVC Design Pattern

StayNest strictly follows the Model-View-Controller (MVC) architectural pattern, separating concerns and ensuring maintainability, testability, and adherence to accessibility standards.

### Model: Database Layer

**Models** represent data structures and database tables. In StayNest, the `Hotel` model interacts with the hotels table:

```php
// app/Models/Hotel.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['name', 'description', 'city', 'stars', 'image_url'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function searchByCity($city)
    {
        return $this->where('city', 'like', "%$city%")->get();
    }
}
```

The Hotel model encapsulates database queries using Eloquent ORM. Instead of raw SQL, developers use expressive methods like `where()`, `get()`, and relationships like `hasMany()`. This separates data logic from presentation.

### Controller: Business Logic Layer

**Controllers** handle requests, invoke models, and prepare data for views. The `HotelController` demonstrates this:

```php
// app/Http/Controllers/HotelController.php
namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        // Retrieve all hotels for homepage display
        $hotels = Hotel::all();
        return view('hotels.index', ['hotels' => $hotels]);
    }

    public function search(Request $request)
    {
        // Validate user input
        $validated = $request->validate([
            'city' => 'required|string|min:2',
            'checkIn' => 'required|date',
            'guests' => 'required|integer|min:1',
        ]);

        // Query using the model
        $results = Hotel::searchByCity($validated['city'])->paginate(12);

        // Pass data to view
        return view('hotels.search', ['results' => $results, 'query' => $validated['city']]);
    }

    public function show(Hotel $hotel)
    {
        // Implicit model binding: Laravel automatically fetches the Hotel
        $rooms = $hotel->rooms;
        return view('hotels.show', ['hotel' => $hotel, 'rooms' => $rooms]);
    }
}
```

The controller does not directly query the database or render HTML. It orchestrates the flow between request, model, and view.

### View: Presentation Layer

**Views** are Blade templates that render HTML. They receive data from controllers and display it to users:

```blade
{{-- resources/views/hotels/search.blade.php --}}
@extends('layouts.app')

@section('content')
<main class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Search Results for {{ $query }}</h1>

    @forelse ($results as $hotel)
        <article class="mb-6 p-4 border border-gray-300 rounded-lg">
            <h2 class="text-xl font-semibold mb-2">
                <a href="{{ route('hotels.show', $hotel->id) }}" class="text-blue-600 hover:underline">
                    {{ $hotel->name }}
                </a>
            </h2>

            <img src="{{ $hotel->image_url }}" alt="Image of {{ $hotel->name }}" class="w-full h-64 object-cover mb-4 rounded">

            <p class="text-gray-700 mb-4">{{ $hotel->description }}</p>

            <span class="inline-block bg-yellow-100 text-gray-900 px-3 py-2 rounded">
                {{ $hotel->stars }} stars
            </span>
        </article>
    @empty
        <p class="text-gray-600">No hotels found. Please refine your search.</p>
    @endforelse

    {{ $results->links() }}
</main>
@endsection
```

This template iterates over hotels passed from the controller. It uses Blade directives (`@forelse`, `@empty`) for conditional rendering, route helpers for accessible links, and semantic HTML for screen readers.

### Why This Matters for Accessibility

The MVC pattern directly supports accessibility:
- **Models** ensure data consistency and validation (preventing errors that confuse users)
- **Controllers** validate input thoroughly before processing, providing clear error feedback
- **Views** can render semantic HTML, ARIA attributes, and keyboard navigation without business logic cluttering the code

## Key Features

- **Hotel Search with Validation:** Users search by city, check-in date, and number of guests. Form validation provides accessible error messages.
- **Detailed Hotel Pages:** Each hotel displays high-resolution images, full descriptions, star ratings, and available rooms with pricing.
- **Room Selection:** Users browse rooms with clear accessibility features: large buttons, colour contrast, descriptive alt text on images.
- **Pagination:** Search results are paginated with accessible controls that indicate current page and available pages.
- **Responsive Design:** The application adapts from mobile (320px) to desktop (1920px+) without JavaScript, ensuring accessibility on all devices.
- **Keyboard Navigation:** All features are fully navigable using the Tab key, arrow keys, and Enter key. No mouse required.
- **Semantic HTML:** Headings, lists, form labels, and landmark regions are properly marked up for screen readers.
- **ARIA Attributes:** Interactive components include aria-labels, aria-describedby, and role attributes where necessary.

## Good Practices Implemented

### 1. Semantic HTML Structure
Instead of using generic `<div>` elements, the application uses semantic tags: `<main>`, `<article>`, `<section>`, `<nav>`, `<header>`, `<footer>`. Screen readers interpret these correctly, improving navigation for visually impaired users.

### 2. Form Accessibility
Every form input has an explicit `<label>` element (not just a placeholder). Labels are properly associated using the `for` attribute and `id`. This allows users with motor disabilities to click larger label areas to focus inputs.

```blade
<label for="search-city" class="block text-sm font-medium text-gray-900">
    City or Hotel Name
</label>
<input type="text" id="search-city" name="city" required class="px-4 py-3 border border-gray-300 rounded-lg">
```

### 3. Colour Contrast and Typography
Text colours are tested against backgrounds to ensure a 7:1 contrast ratio (AAA standard). Font sizes are generous (16px minimum for body text), and line heights (1.5+) improve readability.

### 4. Skip Links and Navigation
A "Skip to Main Content" link appears on focus, allowing keyboard users to bypass repetitive navigation. The main navigation is marked with `<nav>` and uses semantic structure.

### 5. Error Handling and User Feedback
When a form validation fails, errors are presented in an accessible alert box above the form. Each error message is associated with the corresponding input field using `aria-describedby`.

```blade
@if ($errors->any())
    <div role="alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <p class="font-bold">Please correct the following errors:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

### 6. Testing and Validation
The codebase includes automated accessibility tests using tools like WAVE and manual keyboard navigation testing across all pages and user flows.

## Future Development

This prototype forms the empirical foundation for the dissertation's Discussion chapter, where audit findings from Booking.com, Expedia, and Trip.com are compared against StayNest's implementation. Potential extensions include:

- User authentication and booking history
- Integration with real hotel APIs (Amadeus, Booking.com Affiliate)
- Payment processing with accessible form controls
- User reviews and ratings with accessible rich text
- Multi-language support with proper language markup
- Advanced search filters (amenities, price range) with accessible controls

## References and Resources

- WCAG 2.2 Standards: https://www.w3.org/WAI/WCAG22/quickref/
- Laravel Documentation: https://laravel.com/docs
- Blade Templating: https://laravel.com/docs/blade
- Eloquent ORM: https://laravel.com/docs/eloquent
- WebAIM Accessibility Resources: https://webaim.org
- Accessible Web: "Is Google Maps accessible?" https://accessibleweb.com/question-answer/is-google-maps-accessible/
- Vision Australia: "Embedded YouTube and Google Maps" https://www.visionaustralia.org/business-consulting/digital-access/blog/embedded-youtube-and-google-maps

## License

This project is licensed under the MIT License. See the LICENSE file for details.

## Author

Ainhoa Itza Casero
BSc (Hons) Information Technology, University of Huddersfield
Dissertation: WCAG 2.2 AAA Accessibility in Hotel Booking Platforms

---

**Note:** StayNest is a prototype developed for academic research. It uses seeded database data and is not connected to real hotel inventory or payment systems. For production deployment, integration with a real hotel API and payment gateway would be required.