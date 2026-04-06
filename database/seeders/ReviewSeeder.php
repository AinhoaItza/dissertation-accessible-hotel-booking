<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        // Keyed by hotel slug — 4–6 reviews each
        $reviews = [

            'the-langham-london' => [
                ['author' => 'James Thornton',    'rating' => 10, 'comment' => 'The Palm Court afternoon tea alone is worth the trip. Service is impeccable — staff remember your name from the moment you arrive. The Chuan Spa left me completely restored.'],
                ['author' => 'Yuki Tanaka',        'rating' => 9,  'comment' => 'We visited from Tokyo and the Langham exceeded even our expectations. The rooms are enormous by London standards, and the marble bathrooms are a genuine luxury.'],
                ['author' => 'Sarah Mitchell',     'rating' => 10, 'comment' => 'Celebrated our 25th anniversary here. The team had arranged flowers, champagne, and a handwritten note in the room. Attention to detail is unmatched in London.'],
                ['author' => 'Pierre Dubois',      'rating' => 8,  'comment' => 'Excellent location for exploring Marylebone and Regent\'s Park. The Roux at The Landau is exceptional — the sommelier\'s Burgundy selection particularly impressive.'],
                ['author' => 'Amanda Foster',      'rating' => 9,  'comment' => 'Stayed in a Superior King and the bed was simply the most comfortable I have ever slept in. Breakfast was a real event, not just a meal. Will return without question.'],
            ],

            'hotel-de-crillon' => [
                ['author' => 'Marie-Claire Fontaine', 'rating' => 10, 'comment' => 'As a Parisian, I had high standards for the Crillon\'s reopening. It surpassed all of them. The Lagerfeld-designed rooms are a work of art and the spa is the finest in the city.'],
                ['author' => 'Robert Hughes',          'rating' => 10, 'comment' => 'The most beautiful hotel room I have ever stayed in. The view of the Obelisk from our bed at sunrise was genuinely moving. Butler service is seamless and unobtrusive.'],
                ['author' => 'Priya Sharma',           'rating' => 9,  'comment' => 'Worth every euro. The Les Ambassadeurs cocktail bar is extraordinary — perhaps the most beautiful bar in Europe. The concierge arranged last-minute Michelin reservations effortlessly.'],
                ['author' => 'Thomas Bellamy',         'rating' => 8,  'comment' => 'Stayed here on a business trip and the Crillon made the whole journey worthwhile. Classic Parisian grandeur done properly — nothing feels fake or theatrical.'],
                ['author' => 'Claudia Werner',         'rating' => 9,  'comment' => 'The Dior Spa experience is unlike anything else in Paris. Three hours of absolute luxury. The Deluxe room with Place de la Concorde view is worth the premium — spectacular at night.'],
                ['author' => 'Jin-Ho Park',            'rating' => 10, 'comment' => 'Arrived from Seoul expecting excellence and received something beyond. Every member of staff has encyclopaedic knowledge of Paris and genuine warmth. The Bernstein Suite is a legend.'],
            ],

            'hotel-arts-barcelona' => [
                ['author' => 'Carmen García',    'rating' => 9,  'comment' => 'As a local Barceloneta resident I was sceptical, but the Arts is genuinely exceptional. The Enoteca restaurant is one of the finest dining experiences in all of Spain.'],
                ['author' => 'Daniel Rousseau',  'rating' => 8,  'comment' => 'The beach access is unbeatable — you step off the hotel terrace directly onto the sand. Rooms are large, modern, and the sea views are incredible from the upper floors.'],
                ['author' => 'Jessica Morrison', 'rating' => 9,  'comment' => 'Visited for a bachelorette weekend and the Arts delivered perfectly. The rooftop pool overlooking the Mediterranean is as glamorous as it looks online. Staff were incredibly helpful.'],
                ['author' => 'Hiroshi Watanabe', 'rating' => 8,  'comment' => 'Outstanding location combining city and beach. The contemporary art throughout the hotel is a genuine collection — not generic prints. Very impressed by the service consistency.'],
                ['author' => 'Rachel Kim',       'rating' => 10, 'comment' => 'Stayed in the Penthouse Suite and had a once-in-a-lifetime experience. The private plunge pool at sunset with the Pyrenees in one direction and open sea in the other is unforgettable.'],
            ],

            'hotel-de-russie' => [
                ['author' => 'Marco Ricci',         'rating' => 10, 'comment' => 'The garden alone makes this the finest hotel in Rome. Breakfast among the jasmine terraces on a spring morning is a memory I will carry forever. Stravinskij Bar is unmissable.'],
                ['author' => 'Jennifer Walsh',      'rating' => 9,  'comment' => 'We have stayed at the best hotels in Rome and the de Russie remains the benchmark. The staff achieve the near-impossible: warmth that feels genuine in a five-star setting.'],
                ['author' => 'François Leblanc',    'rating' => 9,  'comment' => 'The Deluxe Garden Room with the jasmine balcony was everything I hoped for. Waking to birdsong in the garden rather than traffic noise is the great luxury of this hotel.'],
                ['author' => 'Giulia Bianchi',      'rating' => 8,  'comment' => 'The spa is worth booking even if you are not staying. The de Russie Spa uses Valmont products and the therapists are extraordinarily skilled. Room service is fast and excellent.'],
                ['author' => 'Christopher Lee',     'rating' => 10, 'comment' => 'The Picasso Suite is the greatest hotel room I have ever experienced. The rooftop view of Rome\'s domes at golden hour, with a glass of Barolo — I had no wish to leave the city.'],
            ],

            'park-hyatt-tokyo' => [
                ['author' => 'Kenji Nakamura',   'rating' => 10, 'comment' => 'As a Tokyo resident, I booked the Park Hyatt for our wedding anniversary. The Presidential Suite is extraordinary — 360 degrees of Tokyo with Fuji on the horizon at dawn.'],
                ['author' => 'Emma Clarke',       'rating' => 9,  'comment' => 'Every Lost in Translation fan must stay here. The New York Bar at midnight with the city spread below is as magical as the film suggests. The Hinoki bathrooms are perfection.'],
                ['author' => 'Michael Chen',      'rating' => 10, 'comment' => 'I travel to Tokyo regularly for business. The Park Hyatt is the only hotel I consider. The staff anticipate your needs before you voice them. The onsen spa is outstanding.'],
                ['author' => 'Isabelle Moreau',   'rating' => 8,  'comment' => 'The pool on a clear day with Fuji in the background is one of the most extraordinary spaces in any hotel in the world. Breakfast is a considered Japanese–Western experience.'],
                ['author' => 'Heinrich Braun',    'rating' => 9,  'comment' => 'Came to Tokyo for the first time and chose wisely. The hotel staff speak impeccable English and go to extraordinary lengths to help you navigate the city. The Deluxe room was magnificent.'],
                ['author' => 'Sophie Trudeau',    'rating' => 10, 'comment' => 'The Park Suite with the Hinoki tub angled toward the skyline is pure theatre. We ordered sake from the minibar, dimmed the city lights, and simply stared at Tokyo for an hour. Unforgettable.'],
            ],

            'the-plaza-hotel' => [
                ['author' => 'David Walton',       'rating' => 9,  'comment' => 'The Plaza is an icon for a reason. The classic rooms have real grandeur — not the faded kind. The Palm Court for champagne at midnight felt genuinely cinematic.'],
                ['author' => 'Rahul Mehta',         'rating' => 8,  'comment' => 'The Central Park View Room is worth every dollar at sunrise. Waking to the park in autumn, with the leaves turning below your window, is something photographs cannot capture.'],
                ['author' => 'Charlotte Pearce',    'rating' => 10, 'comment' => 'Stayed in the Eloise Suite for my daughter\'s birthday — she was overwhelmed. The staff had left a personalised Eloise storybook and hand-drawn illustrations on the pillow. Magical.'],
                ['author' => 'José Martínez',       'rating' => 5,  'comment' => 'For the price I expected perfection. The room had a persistent air conditioning rattle that maintenance never fully resolved. The Rose Club bar was excellent but the food service was slow.'],
                ['author' => 'Ana Lima',             'rating' => 9,  'comment' => 'The Presidential Suite is the most impressive hotel space I have experienced. Three rooms, a formal dining table for twelve, and Central Park from every window. Worth celebrating.'],
            ],

            'the-st-regis-new-york' => [
                ['author' => 'William Ashford',     'rating' => 10, 'comment' => 'The St. Regis Butler Service is genuinely unlike anything else in New York. My butler pressed my suits, arranged a last-minute theatre booking, and remembered my preferred whisky without being asked on the second visit.'],
                ['author' => 'Natalia Kovač',       'rating' => 9,  'comment' => 'The King Cole Bar is a New York institution. The Bloody Mary is superb, the Maxfield Parrish mural is breathtaking, and the bartenders have an encyclopaedic knowledge of cocktail history.'],
                ['author' => 'Tom Greenfield',      'rating' => 5,  'comment' => 'Impressive heritage but showing age in the plumbing. Our bathroom had intermittent hot water issues for two days and the resolution was slow. At these rates I expect immediate action.'],
                ['author' => 'Mei-Ling Zhou',       'rating' => 9,  'comment' => 'The Fifth Avenue View Room is spectacular at dusk. Watching the city lights come on from the bathtub while the butler serves champagne is the full New York fantasy.'],
                ['author' => 'Patrick O\'Sullivan', 'rating' => 4,  'comment' => 'The lobby is stunning but the rooms felt dated compared to newer luxury hotels nearby. The price premium feels based on reputation rather than current product. Service was patchy on our floor.'],
            ],

            'four-seasons-new-york' => [
                ['author' => 'Sandra Hoffmann',     'rating' => 10, 'comment' => 'I.M. Pei\'s tower is extraordinary — the lobby alone justifies the visit. Our Park View Room had the most perfectly silent air conditioning I have encountered in any city hotel, anywhere.'],
                ['author' => 'James Okafor',        'rating' => 8,  'comment' => 'The Four Seasons delivers consistent excellence. The spa is genuinely world-class and the Ty Bar is one of the finest hotel bars in Manhattan. Service throughout was attentive without being intrusive.'],
                ['author' => 'Lucia Ferrante',      'rating' => 6,  'comment' => 'Beautiful hotel but the restaurant did not match the room quality. Food was overpriced even by New York standards and service at breakfast was rushed and inattentive. The rooms themselves are exceptional.'],
                ['author' => 'Alex Drummond',       'rating' => 9,  'comment' => 'Stayed for a week on a business trip. The consistency of the Four Seasons is what sets it apart — every interaction, every morning, every meal met the same high standard. Reliable in the best possible way.'],
                ['author' => 'Yoko Inoue',          'rating' => 5,  'comment' => 'The rooms are beautiful but noise from 57th Street was significant on a lower floor. Asked to move and was told no rooms were available. For the price, a quieter room should be guaranteed.'],
            ],

            'the-carlyle' => [
                ['author' => 'Edward Cavendish',    'rating' => 10, 'comment' => 'The Carlyle has no equal for discreet, residential luxury in New York. Bemelmans Bar on a winter evening — with a martini and the Madeline murals — is one of life\'s genuine pleasures.'],
                ['author' => 'Grace Sullivan',      'rating' => 9,  'comment' => 'Café Carlyle is a living piece of New York cultural history. We caught a late show and the intimacy of the room makes the performance extraordinary. The rooms are impeccably maintained.'],
                ['author' => 'Marcus Webb',         'rating' => 6,  'comment' => 'The location on the Upper East Side is wonderful but it means cabs everywhere. The rooms, while beautiful, are smaller than competitors at this price point. The art deco charm is real but some areas feel tired.'],
                ['author' => 'Fiona Blackwood',     'rating' => 10, 'comment' => 'Stayed here every year for a decade and it never disappoints. The staff know their long-stay guests genuinely — not just from a file. That kind of institutional warmth is almost impossible to manufacture.'],
                ['author' => 'Neil Patterson',      'rating' => 5,  'comment' => 'Overrated at current prices. The rooms are pleasant but unremarkable for the rate, and the restaurant is outclassed by a dozen places within walking distance. The bar is the only truly special element.'],
            ],

            'baccarat-hotel-new-york' => [
                ['author' => 'Isabelle Fontaine',   'rating' => 10, 'comment' => 'The most visually stunning hotel I have ever stayed in. Every surface glitters. The Grand Salon at night — with the 9,000-crystal chandelier reflected in every surface — is genuinely theatrical.'],
                ['author' => 'Ryan Kowalski',       'rating' => 8,  'comment' => 'The Spa de La Mer is the highlight. Four hours of treatment in the most beautiful spa environment I have encountered. The pool is extraordinary. The rooms live up to the public spaces.'],
                ['author' => 'Diane Marchetti',     'rating' => 4,  'comment' => 'The design is dazzling but it overwhelms any sense of comfort or intimacy. The hotel feels more like a showroom than a place to relax. The price is unjustifiable when comparable service is available elsewhere.'],
                ['author' => 'Oliver Chen',         'rating' => 9,  'comment' => 'Opposite MoMA and perfectly positioned for Midtown. The Chevalier restaurant is genuinely exceptional — the tasting menu is one of the best in New York. Crystal Room is exactly as opulent as it sounds.'],
                ['author' => 'Priya Anand',         'rating' => 6,  'comment' => 'Stunning aesthetics but some service inconsistencies on our stay. The butler service was attentive one day and nearly absent the next. For this rate, consistency should be guaranteed, not aspirational.'],
            ],

            'the-waldorf' => [
                ['author' => 'Catherine Brooke',    'rating' => 10, 'comment' => 'The Savoy invented the modern luxury hotel and it still defines the genre. The Thames Foyer afternoon tea is the finest in London — the pianist, the winter garden, the scones. Genuinely unmatched.'],
                ['author' => 'Stefan Nowak',        'rating' => 9,  'comment' => 'The River Suite with the Thames panorama is extraordinary value relative to other London river-view properties. The American Bar is a cultural institution — the oldest cocktail bar in Europe.'],
                ['author' => 'Harriet Quinn',       'rating' => 5,  'comment' => 'The historic areas are wonderful but our room overlooked a service courtyard rather than the Thames despite requesting a river view. The booking team were apologetic but offered no meaningful resolution.'],
                ['author' => 'David Nakamura',      'rating' => 8,  'comment' => 'Stayed for three nights on a business visit. The concierge arranged a private tour of the City that was extraordinary. Rooms are elegant and well-maintained. Breakfast is a genuinely special occasion.'],
                ['author' => 'Emma-Louise Fraser',  'rating' => 4,  'comment' => 'The renovation has made the public spaces beautiful but the standard rooms feel generic. The price is now at Claridge\'s level but the product does not match. Worth visiting for the American Bar, not for the rooms.'],
            ],

            'claridges' => [
                ['author' => 'Victoria Pemberton',  'rating' => 10, 'comment' => 'Claridge\'s is simply the finest hotel in London. Every detail is considered, every member of staff knows their role perfectly, and the art deco interiors are a genuine work of architecture. A benchmark for everything.'],
                ['author' => 'Bernard Lacroix',     'rating' => 9,  'comment' => 'The French Salon for afternoon tea surpasses even the Savoy. The Christmas tree in the lobby has become a London cultural event. I bring visiting clients here and it never fails to impress.'],
                ['author' => 'Samantha Ridley',     'rating' => 6,  'comment' => 'Iconic atmosphere but the rooms on our floor had street noise from Brook Street at weekends. For the rates charged, soundproofing should be absolute. The public spaces are exceptional; the rooms are merely good.'],
                ['author' => 'Hugo Steinberg',      'rating' => 10, 'comment' => 'The Davies and Brook restaurant under Daniel Humm is the best hotel dining in London. The staff have a warmth that is uniquely Claridge\'s — formal yet genuinely kind. No other London hotel manages this combination.'],
                ['author' => 'Aoife Murphy',        'rating' => 5,  'comment' => 'The reputation is extraordinary but our stay did not fully match it. The room was smaller than expected for the price and housekeeping missed our room entirely on the second day. Below the standard I expected.'],
            ],

            'the-ritz-london' => [
                ['author' => 'Arthur Whitmore',     'rating' => 10, 'comment' => 'The Ritz is a national treasure. The Louis XVI dining room is the most beautiful room in London and the afternoon tea is a genuine ceremony. The staff carry an elegance that cannot be trained — it is inherited.'],
                ['author' => 'Chiara Russo',        'rating' => 9,  'comment' => 'We celebrated our honeymoon here and the team went to extraordinary lengths. The William Kent Room for dinner, a private suite with park views, and champagne at midnight. Everything was perfect.'],
                ['author' => 'Geoffrey Barnes',     'rating' => 5,  'comment' => 'The public rooms are among the most beautiful in the world but the standard bedrooms are surprisingly compact for the price. The dress code in the restaurant felt unnecessarily rigid for modern guests.'],
                ['author' => 'Ingrid Svensson',     'rating' => 10, 'comment' => 'Afternoon tea at The Ritz is a once-in-a-lifetime experience. The sandwiches, the scones, the pastries, the piano — everything is calibrated to perfection. Booked a room just to stay for the full experience.'],
                ['author' => 'Kevin Doyle',         'rating' => 4,  'comment' => 'The heritage is irreplaceable but the service was inconsistent on our stay. Waited 40 minutes for room service that arrived cold. The Ritz charges for perfection and should deliver it without exception.'],
            ],

            'the-connaught' => [
                ['author' => 'Caroline Forsythe',   'rating' => 10, 'comment' => 'The Connaught Bar is the finest hotel bar in the world — full stop. The martini trolley, the bespoke cocktail creation, the atmosphere. The rooms match the bar\'s standard perfectly.'],
                ['author' => 'Aleksei Volkov',      'rating' => 9,  'comment' => 'Hélène Darroze\'s restaurant is extraordinary. Two Michelin stars and a menu that changes with genuine creativity. The wine list is one of the best in London. The Mayfair location is irreplaceable.'],
                ['author' => 'Jennifer North',      'rating' => 6,  'comment' => 'The hotel is beautiful but the room sizes at this price point are modest. The Connaught bar is genuinely exceptional — visited as a non-guest and it lived up to its global reputation. The bedrooms are a step below.'],
                ['author' => 'Luca Ferretti',       'rating' => 10, 'comment' => 'Stayed six times over the years. The Connaught is the only hotel in London where I feel genuinely at home. The spa is excellent, the service is human in the best sense, and the Mayfair neighbourhood is perfect.'],
                ['author' => 'Rachel Tanner',       'rating' => 5,  'comment' => 'Disappointing for the price. Our room faced a light well with no natural light, which was not mentioned at booking. The front desk was apologetic but had no alternatives. Too expensive for a dark room.'],
            ],

            'le-bristol-paris' => [
                ['author' => 'Adèle Vauclair',      'rating' => 10, 'comment' => 'Le Bristol is the pinnacle of Parisian luxury. Épicure has three Michelin stars and deserves every one. The rooftop pool in summer with the Paris skyline is a secret the hotel guards well.'],
                ['author' => 'James Whitfield',     'rating' => 9,  'comment' => 'The Bristol Cat is a genuine institution. Waking to find Fa-Raon asleep on the courtyard bench is a uniquely Parisian luxury hotel experience. The rooms are the most comfortable beds in Paris.'],
                ['author' => 'Nathalie Chevalier',  'rating' => 5,  'comment' => 'Épicure is extraordinary but the brasserie 114 Faubourg was a disappointment — slow service and food that did not justify the pricing. The room was perfect. Overall a mixed experience.'],
                ['author' => 'Samuel Osei',         'rating' => 10, 'comment' => 'The suite overlooking the interior garden is one of the great hotel rooms in Europe. The silence in the heart of Paris is remarkable. The spa uses Codage products and is genuinely excellent.'],
                ['author' => 'Heather Mackenzie',   'rating' => 6,  'comment' => 'Beautiful hotel but the checkout process was surprisingly slow and disorganised for a property at this level. The rooms are magnificent. The service in the bar and restaurant is professional but impersonal.'],
            ],

            'four-seasons-george-v' => [
                ['author' => 'Philippe Gaillard',   'rating' => 10, 'comment' => 'The George V is the finest hotel in Paris. Le Cinq has three Michelin stars and Christian Le Squer\'s cooking is extraordinary. The flower arrangements in the lobby alone are worth a visit.'],
                ['author' => 'Margaret Sullivan',   'rating' => 9,  'comment' => 'The location on the Avenue George V makes this unbeatable for the Golden Triangle. The Deluxe room was immense. The concierge arranged dinner at Taillevent on 24 hours\' notice. Exceptional.'],
                ['author' => 'Erik Johansson',      'rating' => 5,  'comment' => 'The public spaces are magnificent but the standard rooms feel corporate in a way that the Crillon and Bristol do not. Le Cinq is brilliant but the bar and brasserie are merely good. The price is the same regardless.'],
                ['author' => 'Yuki Yamamoto',       'rating' => 10, 'comment' => 'Stayed for our 30th anniversary. The team arranged a private dinner in the garden courtyard surrounded by the famous floral arrangements. The gesture was extraordinary and entirely unrequested.'],
                ['author' => 'Patricia Devlin',     'rating' => 4,  'comment' => 'Overpriced relative to the Paris competition. The rooms are large and comfortable but the service has a corporate Four Seasons efficiency that feels at odds with Paris. No warmth — just process.'],
            ],

            'mandarin-oriental-paris' => [
                ['author' => 'Cécile Renard',       'rating' => 10, 'comment' => 'The spa is the finest in Paris — the indoor pool beneath the chandelier is breathtaking. The rooms on the Rue Saint-Honoré side have the most beautiful views of the Paris rooftops. Surpassed every expectation.'],
                ['author' => 'Daniel Hartmann',     'rating' => 8,  'comment' => 'Sur Mesure by Thierry Marx holds two Michelin stars and the tasting menu is among the most creative dining experiences I have had in France. The cocktail bar is underrated and exceptional.'],
                ['author' => 'Sofía Ramírez',       'rating' => 6,  'comment' => 'The hotel is beautiful but the breakfast was unexpectedly average for a Mandarin Oriental property. The rooms were immaculate. The spa is genuinely world-class. Mixed across the experience overall.'],
                ['author' => 'Robert Klaassen',     'rating' => 9,  'comment' => 'Prime location on the Rue Saint-Honoré makes shopping effortless. The rooms are among the most thoughtfully designed in Paris — the attention to detail in the materials and lighting is extraordinary.'],
                ['author' => 'Fiona Ashby',         'rating' => 4,  'comment' => 'The exterior and lobby promise more than the rooms deliver. Our deluxe room was modest in size and the bathroom layout was awkward. The Mandarin Oriental brand commands a premium the Paris property does not fully earn.'],
            ],

            'le-meurice' => [
                ['author' => 'Henri Beaumont',      'rating' => 10, 'comment' => 'Le Meurice is the most elegant hotel in Paris. The Salon Proust for afternoon tea, Alain Ducasse\'s three-Michelin-star restaurant, the Tuileries view — all are irreplaceable. The definition of Parisian grandeur.'],
                ['author' => 'Susan Crawford',      'rating' => 9,  'comment' => 'The Belle Étoile terrace suite is the most spectacular room in Paris. The private terrace with 360-degree views from Montmartre to the Eiffel Tower at sunset is something no photograph can capture adequately.'],
                ['author' => 'Tomáš Novák',         'rating' => 5,  'comment' => 'The restaurant and lobby are exceptional but our standard room had a partial view of a neighbouring building rather than the Tuileries. Feels like the hotel allocates its best rooms by spend history rather than booking.'],
                ['author' => 'Akira Matsumoto',     'rating' => 10, 'comment' => 'Stayed for five nights and never wanted to leave. The bar, the spa, the restaurant — every element performs at the same extraordinary level. The Tuileries view from the breakfast room is unmatched in Paris.'],
                ['author' => 'Laura Bentley',       'rating' => 6,  'comment' => 'The public spaces are breathtaking but the standard rooms are dated compared to the Bristol and Crillon at similar prices. The Ducasse restaurant is genuinely transcendent. The rooms need the investment the public spaces have received.'],
            ],

            'w-barcelona' => [
                ['author' => 'Marta Puig',          'rating' => 9,  'comment' => 'The W is the most dramatic hotel building in Barcelona. The Bravo beach club is the best way to spend a Barcelona afternoon. Watching the sunset over the Mediterranean from the WET pool is something I will never forget.'],
                ['author' => 'Connor Bradley',      'rating' => 8,  'comment' => 'The Extreme WOW suite is an experience in itself — a private pool and terrace at the tip of the Barcelona waterfront. The party atmosphere in the hotel suits some guests better than others but we loved it.'],
                ['author' => 'Silvia Moreno',       'rating' => 4,  'comment' => 'Too noisy for a relaxing stay. The bar and club music was audible in our room until 3am on both nights. Complained twice and the front desk were sympathetic but powerless. Not appropriate if you want to sleep.'],
                ['author' => 'Ben Whitaker',        'rating' => 8,  'comment' => 'The best hotel pool area in Barcelona by a significant margin. The Wave restaurant has excellent seafood and the location at the end of Barceloneta is unique. Worth the premium if you want beach and city together.'],
                ['author' => 'Kristína Horáčková',  'rating' => 5,  'comment' => 'The design is extraordinary but the service did not match the visual ambition. Staff were friendly but often uninformed about the hotel\'s own facilities. The rooms felt smaller than the photos suggest.'],
            ],

            'mandarin-oriental-barcelona' => [
                ['author' => 'Jordi Esteve',        'rating' => 10, 'comment' => 'The best hotel on the Passeig de Gràcia without question. Moments is the finest restaurant in Barcelona — Carme Ruscalleda\'s cooking is extraordinary. The terrace pool overlooking the Modernista facades is unforgettable.'],
                ['author' => 'Lisa Holden',         'rating' => 9,  'comment' => 'The spa is exceptional — the best in the city. The Blanc restaurant for Sunday lunch is a real event. The building, a restored 1950s bank, has an elegance that the newer Barcelona hotels cannot replicate.'],
                ['author' => 'Victor Schreiber',    'rating' => 5,  'comment' => 'Moments is genuinely world-class but the standard rooms are modest for the price. The pool is small and often full. For a hotel of this calibre the pool and gym area needs more investment.'],
                ['author' => 'Nuria Solà',          'rating' => 10, 'comment' => 'As a Barcelona resident I treat the MO as my local luxury retreat. The spa treatments, the bar, the breakfast — all are calibrated perfectly. The Passeig de Gràcia rooms are the best hotel rooms in my city.'],
                ['author' => 'Andrew Fitch',        'rating' => 6,  'comment' => 'Great location and beautiful lobby but the room allocated was noisy due to a ventilation shaft. Moved after one night to a better room. The second room was excellent. Initial allocation below standard.'],
            ],

            'hotel-casa-fuster' => [
                ['author' => 'Isabel Comas',        'rating' => 7,  'comment' => 'Great value for the Passeig de Gràcia location. The room was small but clean, and the Café Vienès downstairs is a real bonus — jazz on Thursday nights is lovely. Do not expect luxury but it is a solid choice.'],
                ['author' => 'Michael Hennessy',    'rating' => 6,  'comment' => 'The building is stunning but the rooms do not live up to the facade. Thin walls, dated bathroom, and slow breakfast service. The rooftop pool is small and busy in summer. Good location, average experience.'],
                ['author' => 'Àngels Puigdomènech', 'rating' => 4,  'comment' => 'Very disappointed. The room smelled musty and the air conditioning was noisy all night. Staff were friendly but unable to resolve the issues. For this area of Barcelona there are better options at the same price.'],
                ['author' => 'Thomas Becker',       'rating' => 7,  'comment' => 'Decent budget stay in a remarkable building. The corridors and public areas are genuinely beautiful. Rooms are basic but clean. WiFi was slow. Would stay again for the location and price, not for the comfort.'],
                ['author' => 'Claire Fontaine',     'rating' => 5,  'comment' => 'The Modernista architecture sells the hotel but the product is decidedly three-star. Breakfast was a buffet with limited options, housekeeping was inconsistent, and the mattress in our room was overdue for replacement.'],
            ],

            'el-palace-barcelona' => [
                ['author' => 'Rosa Vilaró',         'rating' => 10, 'comment' => 'El Palace has been a Barcelona institution for over a century and it earns its reputation every day. The rooftop pool with Eixample views is the finest in the city. La Dolce Vita is excellent.'],
                ['author' => 'George Hadley',       'rating' => 8,  'comment' => 'Stayed here for a conference and the meeting facilities matched the hotel\'s general excellence. The Mezzanine bar in the evening is a genuine highlight — cocktails and a beautifully restored space.'],
                ['author' => 'Montserrat Pla',      'rating' => 6,  'comment' => 'The hotel is beautiful and the Gran Via location is excellent. However, our room was directly above a noisy kitchen extract and the smell was intrusive. Management apologised but did not offer a room change.'],
                ['author' => 'Frederick Müller',    'rating' => 9,  'comment' => 'The Beaux-Arts facade is extraordinary and the interior has been restored with real care. The rooftop terrace at sunset with the Eixample grid spread below you is one of Barcelona\'s great views.'],
                ['author' => 'Hannah Watts',        'rating' => 5,  'comment' => 'Lovely hotel with genuine history but the standard rooms are small and the bathroom in ours had clearly not been renovated in some years. The spa and rooftop deserve the premium — the basic rooms do not.'],
            ],

            'rome-cavalieri' => [
                ['author' => 'Francesca Conti',     'rating' => 10, 'comment' => 'La Pergola is the best restaurant in Rome — three Michelin stars and a view of the eternal city that reduces you to silence. The Cavalieri\'s art collection would grace any national gallery.'],
                ['author' => 'David Saunders',      'rating' => 9,  'comment' => 'The three pools and 15 acres of parkland make this the most complete resort experience in Rome. The shuttle service to the centre works perfectly. An escape from the city heat that still gives you the city.'],
                ['author' => 'Camilla Di Marzo',    'rating' => 5,  'comment' => 'The location on Monte Mario is beautiful but it is genuinely isolated from central Rome. The shuttle runs every 30 minutes and is not always reliable. The hotel is wonderful but factor in the inconvenience.'],
                ['author' => 'William Park',        'rating' => 10, 'comment' => 'We visited specifically for La Pergola\'s tasting menu and booked a room to make an evening of it. The meal was among the finest I have had anywhere in Europe. The suite with city views was extraordinary.'],
                ['author' => 'Giuliana Ferrara',    'rating' => 4,  'comment' => 'The hotel has extraordinary facilities but the food in the pool restaurant was overpriced and mediocre. The main pool area was overcrowded on our two visits. La Pergola is exceptional; the rest of the food offer is not.'],
            ],

            'hotel-eden-rome' => [
                ['author' => 'Sofia Gentile',       'rating' => 10, 'comment' => 'Il Giardino rooftop is the most beautiful restaurant view in Rome. The kitchen matches the setting — the pasta and seafood are genuinely excellent. The rooms are among the most intimate in Rome\'s luxury tier.'],
                ['author' => 'Charles Whitmore',    'rating' => 9,  'comment' => 'The Eden\'s scale — small, intimate, personal — is its great advantage. Every member of staff knows your name and preferences. The Pincian Hill location is perfect: quiet, central, and green.'],
                ['author' => 'Valentina Esposito',  'rating' => 6,  'comment' => 'The rooftop is extraordinary but our room was on the second floor with a limited view. The price does not differentiate enough between rooms — paying Eden rates for a partial airshaft view is disappointing.'],
                ['author' => 'James Forsythe',      'rating' => 10, 'comment' => 'Stayed at the Eden for ten years when visiting Rome. The consistency across a decade is remarkable. The same warmth, the same standard, the same genuine pleasure in every stay. Audrey Hepburn was right about the view.'],
                ['author' => 'Nadine Richter',      'rating' => 5,  'comment' => 'Lovely hotel in a wonderful location but the bathroom in our deluxe room was genuinely small — barely room to turn around. For a Dorchester Collection property at these rates, the room sizing needs addressing.'],
            ],

            'palazzo-manfredi' => [
                ['author' => 'Antonio Lombardi',    'rating' => 8,  'comment' => 'Unbeatable location next to the Colosseum. The room was basic but comfortable, and the rooftop terrace is a wonderful place to sit in the evening. Great value for central Rome.'],
                ['author' => 'Catherine Eliot',     'rating' => 6,  'comment' => 'The Colosseum is literally across the road which is amazing, but the room itself was tired — peeling paint near the window and a shower with weak pressure. The location saves it.'],
                ['author' => 'Marco Pellegrini',    'rating' => 4,  'comment' => 'No gym, no pool, limited facilities. The restaurant on-site was overpriced for the quality. The neighbourhood can be noisy at night from tour groups. Expected more for the price.'],
                ['author' => 'Anna-Karin Lindberg', 'rating' => 7,  'comment' => 'A good three-star option if you want to be close to the Colosseum without paying five-star prices. The staff were helpful, the room was clean, and the terrace bar is a real highlight at sunset.'],
                ['author' => 'Thomas Holt',         'rating' => 5,  'comment' => 'Mixed experience. Check-in was slow and the room we were given faced the internal courtyard, not the Colosseum. Had to ask twice to be moved. Location is genuinely excellent once you are settled.'],
            ],

            'hotel-hassler-roma' => [
                ['author' => 'Roberto Fantini',     'rating' => 10, 'comment' => 'The Hassler at the top of the Spanish Steps is Rome\'s great classic hotel. Imàgo has a Michelin star and the view from the rooftop restaurant — over all of Rome at sunset — is the finest in the city.'],
                ['author' => 'Emily Stanton',       'rating' => 8,  'comment' => 'The location at the head of the Spanish Steps is incomparable. Waking up, opening the shutters, and looking down the full length of the Steps to the Barcaccia fountain is a genuinely Roman experience.'],
                ['author' => 'Giovanni Caruso',     'rating' => 5,  'comment' => 'The Hassler lives on heritage and location. The rooms, while well-maintained, have not been significantly updated and feel dated compared to the newer Rome luxury properties. The location remains unsurpassable.'],
                ['author' => 'Brigitte Lefebvre',   'rating' => 9,  'comment' => 'Imàgo is worth a visit even without staying. The food is refined and precise, and the panoramic window gives you all of Rome\'s domes at once. The Hassler Bar below is a perfect pre-dinner ritual.'],
                ['author' => 'Patrick Flanagan',    'rating' => 4,  'comment' => 'For the price I expected a room renovation within this decade. The bathroom fittings in our superior room were genuinely old and one tap was faulty on arrival. The public spaces are magnificent; the rooms need work.'],
            ],

            'the-peninsula-tokyo' => [
                ['author' => 'Haruka Fujimoto',     'rating' => 10, 'comment' => 'The Peninsula Tokyo commands the finest views of the Imperial Palace gardens. The Peter Bar at the top of the tower is the best place to watch night fall over Tokyo. Service is Peninsula at its most refined.'],
                ['author' => 'Stuart Morrison',     'rating' => 9,  'comment' => 'The rooms are among the most technologically thoughtful of any hotel I have visited — every system controlled perfectly from the bedside panel. The breakfast combining Japanese and Western is outstanding.'],
                ['author' => 'Miho Sasaki',         'rating' => 5,  'comment' => 'The hotel is beautiful but the Hei Fung Terrace was a disappointment — the Cantonese dim sum was average by the standards of Hong Kong or even London. For a Michelin-recommended restaurant, it underperformed.'],
                ['author' => 'Lars Andersen',       'rating' => 10, 'comment' => 'The Peninsula Spa is the finest in Tokyo. The full-day programme using bespoke Japanese-influenced treatments was extraordinary. The staff have a warmth and precision that is uniquely Japanese.'],
                ['author' => 'Keiko Tanaka',        'rating' => 6,  'comment' => 'The location between the Imperial Palace and Ginza is ideal. The rooms are excellent. However, the pool area is surprisingly small for a hotel of this ambition and was busy every time we tried to use it.'],
            ],

            'aman-tokyo' => [
                ['author' => 'Noboru Hayashi',      'rating' => 10, 'comment' => 'The most serene hotel experience in any city I have visited. The cedar and stone 30-metre pool is unlike anything else in Tokyo. The silence on the upper floors of the Otemachi Tower is absolute.'],
                ['author' => 'Alice Bergström',     'rating' => 10, 'comment' => 'Aman Tokyo redefines what a city hotel can be. The rooms are the largest in Tokyo and the views of the Imperial Palace gardens and, on clear days, Fuji, are extraordinary. Worth every yen.'],
                ['author' => 'Takeshi Ogawa',       'rating' => 7,  'comment' => 'The Aman experience is genuinely unique but the Arva restaurant does not match the rooms and spa. Italian food in Tokyo at Aman prices should be exceptional — it was merely good. A rare weak point.'],
                ['author' => 'Sophie Reinhardt',    'rating' => 9,  'comment' => 'Came for the spa and stayed for the rooms. The Aman Spa has the most thoughtful treatment menu I have encountered — combining traditional Japanese techniques with modern therapy in a cedar and stone space of great beauty.'],
                ['author' => 'Mark Donovan',        'rating' => 5,  'comment' => 'The price is the highest in Tokyo and the experience is extraordinary — but the location in the Otemachi financial district has no neighbourhood life. Perfect if you want silence; isolating if you want Tokyo energy.'],
            ],

            'the-tokyo-station-hotel' => [
                ['author' => 'Fumiko Ishida',       'rating' => 10, 'comment' => 'Staying inside a UNESCO-listed national treasure is a genuinely unique experience. The Dome rooms with their original Taisho-era domed ceilings are extraordinary. The connection to the station makes the whole of Japan accessible.'],
                ['author' => 'James Hartley',       'rating' => 9,  'comment' => 'The history of this building is extraordinary — completed in 1914 and hand-restored to the original specifications. The Oak Door Bar in the original dome lobby is the most atmospheric hotel bar in Japan.'],
                ['author' => 'Yōko Nishimura',      'rating' => 5,  'comment' => 'The building is magnificent but the standard rooms overlooking the station are very noisy from the Shinkansen. Ear plugs were provided — which suggests the hotel knows the problem. Request an Imperial Palace-side room.'],
                ['author' => 'David Pearce',        'rating' => 8,  'comment' => 'The Brasserie 1899 for breakfast is one of the best hotel breakfasts in Tokyo — the combination of Japanese and European at a very high standard. The location within the station is genuinely convenient for rail travel.'],
                ['author' => 'Akiko Mori',          'rating' => 4,  'comment' => 'The architecture is irreplaceable but the room service was very slow on both nights and the food arrived cold once. For a hotel charging premium rates, operational consistency should match the building\'s extraordinary standard.'],
            ],

            'andaz-tokyo' => [
                ['author' => 'Ryō Kimura',          'rating' => 7,  'comment' => 'Good value business hotel in Toranomon. Rooms are clean and modern, the WiFi is fast, and the subway access is convenient. The rooftop bar is a nice touch for a three-star property. Would stay again for work trips.'],
                ['author' => 'Emma Hartley',        'rating' => 6,  'comment' => 'Decent mid-range hotel. The room was smaller than the photos suggested and the air conditioning was noisy. Breakfast was a basic buffet — fine but nothing special. Location is fine for business, quiet for tourism.'],
                ['author' => 'Sven Johansson',      'rating' => 4,  'comment' => 'Below average for the price. The lift was out of service for part of our stay, housekeeping missed our room on day two, and the front desk were slow to respond to complaints. Needs better management.'],
                ['author' => 'Natsumi Watanabe',    'rating' => 7,  'comment' => 'A solid three-star choice in central Tokyo. The Tavern restaurant serves straightforward food at fair prices. The rooms are functional and clean. Not exciting, but reliable. Good for a short business stay.'],
                ['author' => 'Patrick Cleary',      'rating' => 5,  'comment' => 'The Toranomon area has very little going on in the evenings. The hotel itself is fine — clean rooms, friendly staff — but the neighbourhood makes it feel isolated. The subway connection saves it as a practical base.'],
            ],

        ];

        foreach ($reviews as $slug => $hotelReviews) {
            $hotel = Hotel::where('slug', $slug)->first();
            if (! $hotel) {
                continue;
            }
            foreach ($hotelReviews as $data) {
                $hotel->reviews()->create($data);
            }
        }
    }
}
