# EMS Landing Page — Requirements

Last updated: 2025-08-22

Purpose: a concise, actionable requirements document you can give to ChatGPT (or a frontend developer) so it can produce a production-ready landing page for this Laravel Employee Management System (EMS) project.

---

## 1) Quick plan & checklist
- [ ] Hero with brand, tagline, CTA (Login/Register)
- [ ] Clear feature tiles (Task Management, Employee Management, RBAC)
- [ ] Why choose us / benefits section
- [ ] CTA block with Login/Register and supporting copy
- [ ] Footer with contact & quick links
- [ ] Responsive + mobile-first layout
- [ ] Theme: Orange / Black / White (dark header background permitted)
- [ ] Use Tailwind CSS + Bootstrap Icons (project already uses them)
- [ ] Auth-aware links (show Dashboard for logged-in users)
- [ ] Data hooks/placeholders for dynamic counts (employees, tasks)
- [ ] Accessibility (WCAG AA) and SEO metadata
- [ ] Deliverables: `welcome.blade.php` (updated), small CSS tweaks (if needed), test checklist

---

## 2) Project analysis (what exists & constraints)
- Laravel application using Blade views, Vite, Tailwind CSS, Bootstrap Icons.
- Models present: `User`, `Employee`, `Task`, `TaskAssignment`, Teams and RBAC (spatie permission likely present).
- Migrations exist for users, employees, tasks, assignments and permissions.
- Current UI uses a header component at `resources/views/layouts/header.blade.php` and an existing `welcome.blade.php` that will be turned into the landing page.
- Preferred color palette: orange (accent), black (contrast background), white (text/sections). Tailwind is already configured and used in the repo.

Assumptions:
- Authentication routes for `login`, `register`, `dashboard`, and `logout` are available.
- Assets (logo) exist at `public/assets/img/Logo2.png` and profile assets are present.
- Tailwind and Bootstrap Icons are available through Vite/CSS pipeline.

---

## 3) Visual & brand guidelines
- Primary accent: #F97316 (Tailwind `orange-500` or a custom orange). Use slightly darker orange `#F97316`/`#FF7A00` on hover for CTAs.
- Background: white for content panels, black header and footer backgrounds. Dark-mode support optional: invert to dark grays/black.
- Typography: Use the project font (Figtree or existing Instrument Sans) — keep sizes consistent with Tailwind (text-base, text-lg, text-2xl...)
- Logo: display the existing `Logo2.png` in the nav and hero. Provide a constrained max-height (h-8 to h-24 depending on context). Keep aspect ratio.

Accessible color contrast:
- Ensure text on orange uses white if orange is darker than WCAG thresholds; otherwise use black on light orange.
- Buttons (primary CTA): orange background + white text. Secondary: white background + orange text + subtle border.

---

## 4) Pages & content sections (structure)
File updated: `resources/views/welcome.blade.php`

Sections required, in order:
1. HTML head: proper <title>, meta description, Open Graph tags, and canonical if available.
2. Navigation (top): logo left, auth links right (Login / Register), `Dashboard` for logged-in users. Sticky header optional.
3. Hero: large headline, supporting paragraph, primary CTA (Get Started / Login), optional hero illustration (logo or SVG). Keep hero vertically centered with adequate whitespace.
4. Feature tiles: 3 columns on md+, 1 column on mobile. Each tile: icon (Bootstrap Icon), title, 1-2 line description, optionally a small CTA or link to docs.
5. Benefits / Why choose us: 2-column grid with short benefit bullets and icons.
6. Social proof / counts (optional): dynamic numbers (Employees: X, Tasks: Y, Teams: Z) — show placeholders if not available.
7. CTA strip: wide orange band with two CTAs (Login / Register) and short supporting sentence.
8. Footer: three columns (About, Quick Links, Contact). Copyright / Year.

Dynamic content/data hooks (Blade placeholders):
- `{{ $employeeCount ?? __('—') }}` — optional variable passed by controller
- `{{ $taskCount ?? __('—') }}`
- Add `@auth` / `@guest` blocks for auth-driven links

---

## 5) Components & markup contract (inputs/outputs)
- NavBar component (input: currentUser boolean) -> output: required nav markup and classes.
- FeatureCard component (inputs: icon, title, description, link(optional)) -> outputs consistent tile markup.
- CTA component (inputs: title, subtitle, primaryLabel, primaryRoute, secondaryLabel, secondaryRoute) -> output CTA band.

Blade snippets (examples you should include):
- Auth check:
  - @if (Route::has('login'))
      @auth
         <a href="{{ url('/dashboard') }}">Dashboard</a>
      @else
         <a href="{{ route('login') }}">Log in</a>
         @if (Route::has('register'))
             <a href="{{ route('register') }}">Register</a>
         @endif
      @endauth
    @endif

- Data placeholder example (in controller pass numbers):
  - Controller snippet: `return view('welcome', ['employeeCount' => Employee::count(), 'taskCount' => Task::count()]);`

---

## 6) Styles & libraries
- Use existing Tailwind utilities. Add minimal custom CSS only when necessary.
- Use Bootstrap Icons (already used elsewhere). Include link in head if not already present.
- Keep classes utility-first; avoid massive custom CSS files.

Tailwind utilities recommendation:
- Layout: `container`, `max-w-7xl`, `mx-auto`, `px-4`, `py-12`
- Hero: `text-4xl md:text-5xl font-bold`, `text-center`, `mb-8`
- Buttons: `.bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg` and secondary `.bg-white text-orange-500 border border-orange-200`

---

## 7) SEO & meta
- Title: “EMS — Employee Management System”
- Meta description (160 chars): “EMS: manage employees, assign tasks, and secure access with roles & permissions. Streamline workflows and track performance.”
- Open Graph: `og:title`, `og:description`, `og:image` (logo), and `og:url`.
- Add `rel="canonical"` if necessary.

---

## 8) Accessibility & internationalization
- Use semantic HTML: <header>, <nav>, <main>, <section>, <footer>.
- All interactive elements must be reachable via keyboard and have visible focus state (`focus:outline-none focus:ring-2 focus:ring-orange-400`).
- Images must have `alt` attributes. Logo alt: `EMS Logo`.
- Ensure color contrast meets WCAG AA for normal text.
- Use translation functions where text may need localization: `__('Welcome to Employee Management System')`.

---

## 9) Data & integrations
- Backend data hooks: counts, featured testimonials (optional), link routes.
- No sensitive data should be shown on the landing page. Use aggregate counts only.
- Analytics: add a spot for GA/Matomo snippet near the end of `<body>` (commented so integrator can add IDs).

---

## 10) Acceptance criteria (how you/ChatGPT know it's done)
- Visual: Landing page matches the color scheme (orange/black/white) and spacing is balanced on desktop and mobile.
- Functional: Login/Register links route correctly; `Dashboard` appears when user is authenticated.
- Dynamic placeholders render counts when variables are passed; otherwise display a graceful placeholder (`—`).
- No Blade syntax errors. Page loads without PHP/Blade parse errors.
- Accessibility: keyboard nav & focus states exist; images have alt text; color contrast passes automated checks.
- SEO: `<title>` and meta description present.

Testing checks (manual):
- [ ] Load page as guest: Login/Register visible.
- [ ] Load page as authenticated user: Dashboard link visible, Login/Register hidden.
- [ ] Mobile view: hero, tiles, and CTA stack properly.
- [ ] Lighthouse (or similar) score: no critical accessibility violations; performance acceptable.

---

## 11) Handoff instructions for ChatGPT (exact prompt template)
Use this prompt to ask ChatGPT to generate the page code. Copy/paste the whole block for best results.

```
You are building a Laravel Blade landing page for an Employee Management System (EMS).
Project notes:
- Uses Tailwind CSS and Vite (already configured).
- Uses Bootstrap Icons via CDN.
- Existing logo at: public/assets/img/Logo2.png
- Models: User, Employee, Task, TaskAssignment
- Auth routes exist: login, register, dashboard, logout

Deliver file: resources/views/welcome.blade.php
Design requirements:
- Theme: Orange (#F97316), Black, White
- Sections: Head (meta + OG), Nav, Hero, Feature cards (3), Why choose us, CTA band, Footer
- Auth-aware links using @auth/@guest
- Use Tailwind utility classes only (no extra frameworks).
- Include blade placeholders for `employeeCount` and `taskCount`.
- Include accessible attributes, alt text, focus states.

Output format: return only the content of `welcome.blade.php` file (no extra explanation). Use Blade syntax for routes and auth checks. Make it responsive and minimal.
```

---

## 12) Deliverables & file list to produce
- `resources/views/welcome.blade.php` — complete landing page
- Short CSS snippet (if necessary) saved to `resources/css/landing.css` (only if a layout cannot be achieved with Tailwind)
- Controller change example (snippet) for counts (optional)

---

## 13) Questions & optional enhancements
- Add testimonial carousel? (yes/no)
- Include a short demo video or screenshot? (will need `public/assets/media`)
- Want localized versions? If yes, provide translations or confirm default locale.

---

## 14) Notes / developer tips
- Keep Blade logic minimal in view files; pass counts from controller.
- Reuse `layouts/header.blade.php` if possible to maintain consistent header across the app.
- If Tailwind utilities clash with existing compiled CSS, add small scoped classes in `resources/css/custom.css` and include via Vite.

---

If you want, I can now:
- Generate the final `welcome.blade.php` using this spec (complete code), or
- Produce a small controller snippet and a sample unit test that asserts the view loads without Blade errors.

Pick one and I will produce the code.
