---
name: "Gold'Or"
description: "Swiss watch and jewellery trade press, set as a broadsheet — slab headlines, hairline rules, square corners, one raised voice."
colors:
  press-magenta: "#e6007e"
  press-magenta-deep: "#c30069"
  ink-black: "#16181d"
  deep-slate-teal: "#0e3742"
  paper-white: "#ffffff"
  paper-sand: "#f6f4f0"
  paper-sand-deep: "#efece6"
  column-grey: "#5a5f66"
  meta-grey: "#686e74"
  hairline-grey: "#e5e2dc"
typography:
  display:
    fontFamily: "Arvo, Rockwell, 'Roboto Slab', Georgia, serif"
    fontSize: "clamp(1.6rem, 2.9vw, 2.25rem)"
    fontWeight: 700
    lineHeight: 1.15
    letterSpacing: "-0.01em"
  headline:
    fontFamily: "Arvo, Rockwell, 'Roboto Slab', Georgia, serif"
    fontSize: "clamp(1.7rem, 3.4vw, 2.5rem)"
    fontWeight: 700
    lineHeight: 1.18
    letterSpacing: "-0.01em"
  title:
    fontFamily: "Arvo, Rockwell, 'Roboto Slab', Georgia, serif"
    fontSize: "1.0625rem"
    fontWeight: 700
    lineHeight: 1.3
    letterSpacing: "-0.01em"
  eyebrow:
    fontFamily: "Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif"
    fontSize: "clamp(1.0625rem, 1.9vw, 1.5rem)"
    fontWeight: 400
    lineHeight: 1.25
    letterSpacing: "0.1em"
  body:
    fontFamily: "'Source Serif 4', 'Source Serif Pro', Georgia, 'Times New Roman', serif"
    fontSize: "1.0625rem"
    fontWeight: 400
    lineHeight: 1.75
    letterSpacing: "normal"
  body-small:
    fontFamily: "'Source Serif 4', 'Source Serif Pro', Georgia, 'Times New Roman', serif"
    fontSize: "0.875rem"
    fontWeight: 400
    lineHeight: 1.65
    letterSpacing: "normal"
  label:
    fontFamily: "Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif"
    fontSize: "0.6875rem"
    fontWeight: 500
    lineHeight: 1.2
    letterSpacing: "0.11em"
  meta:
    fontFamily: "Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif"
    fontSize: "0.75rem"
    fontWeight: 400
    lineHeight: 1.5
    letterSpacing: "normal"
  button:
    fontFamily: "Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif"
    fontSize: "0.875rem"
    fontWeight: 500
    lineHeight: 1.2
    letterSpacing: "normal"
rounded:
  square: "0px"
  input: "2px"
  pill: "999px"
spacing:
  gutter: "clamp(20px, 4vw, 40px)"
  grid-gap: "clamp(24px, 3vw, 40px)"
  section-y: "clamp(48px, 6vw, 84px)"
  section-y-tight: "clamp(32px, 4vw, 52px)"
  measure: "780px"
components:
  button-primary:
    backgroundColor: "{colors.press-magenta}"
    textColor: "{colors.paper-white}"
    typography: "{typography.button}"
    rounded: "{rounded.pill}"
    padding: "0.7rem 1.6rem"
  button-primary-hover:
    backgroundColor: "{colors.press-magenta-deep}"
    textColor: "{colors.paper-white}"
  chip-filter:
    backgroundColor: "{colors.paper-white}"
    textColor: "{colors.column-grey}"
    rounded: "{rounded.pill}"
    padding: "0.42rem 1.15rem"
  chip-filter-active:
    backgroundColor: "{colors.press-magenta}"
    textColor: "{colors.paper-white}"
    rounded: "{rounded.pill}"
    padding: "0.42rem 1.15rem"
  card-story:
    backgroundColor: "{colors.paper-white}"
    textColor: "{colors.ink-black}"
    rounded: "{rounded.square}"
    padding: "0"
  card-story-media:
    backgroundColor: "{colors.paper-sand-deep}"
    rounded: "{rounded.square}"
  input-field:
    backgroundColor: "{colors.paper-white}"
    textColor: "{colors.ink-black}"
    rounded: "{rounded.input}"
    padding: "0.6rem 0.9rem"
  tag-category:
    textColor: "{colors.press-magenta}"
    typography: "{typography.label}"
  badge-paywall:
    backgroundColor: "{colors.press-magenta}"
    textColor: "{colors.paper-white}"
    typography: "{typography.label}"
    rounded: "{rounded.square}"
    padding: "7px 10px"
---

# Design System: Gold'Or

## Overview

**Creative North Star: "The Workbench Broadsheet"**

Gold'Or is trade press for people who work with their hands at a bench. The system is set like a broadsheet and behaves like ink on paper: full-width bands of stock, hairline rules, square corners, columns that hold their measure. Nothing is rendered as a floating object, because nothing on a printed sheet floats. Depth is a change of paper, not a change of altitude.

The philosophy is restrained and exact. Authority here comes from precision and consistency, never from decoration — the design's job is to get out of the way of trade information and then be impeccable about how that information is set. Three typefaces do three jobs and never trade places: Arvo names things, Source Serif 4 tells you about them, Inter labels and operates. Press Magenta is the single raised voice in an otherwise achromatic system, and it earns that by being rare.

Two rejections are binding. This is not a SaaS product site: no gradients, no drop-shadowed rounded cards, no illustrated spot graphics. And it is not a generic news portal: no boxed modules, no teaser grids without hierarchy, no ad clutter competing with editorial. Advertising is house-sold and set like the rest of the page.

**Key Characteristics:**
- Full-bleed alternating bands (Paper White / Paper Sand) as the only sectioning device
- Square corners everywhere; fully-round pills reserved exclusively for actions
- Zero shadows on the page plane — depth is tonal, structure is hairline
- Slab-serif headings over serif reading text with a sans UI layer, strictly separated
- One accent colour, used sparingly enough that it always means something

## Colors

An achromatic press palette — warm off-white paper, near-black ink, three greys — interrupted by exactly one saturated colour and grounded once by a single dark field.

### Primary
- **Press Magenta** (#e6007e): The brand's inherited voice, carried by the wordmark, the favicon and the login screen. On the page it does four jobs and no others: action buttons, the active filter chip, category tags, and inline links. Never a section background, never a large decorative field, never a heading colour.
- **Press Magenta Deep** (#c30069): Hover and active state for anything filled with Press Magenta. Exists only as a state; never a resting colour.

### Secondary
- **Deep Slate Teal** (#0e3742): The single dark field in the system, reserved for the one full-bleed conversion band per page. Its scarcity is what makes that band read as a deliberate interruption rather than another section.

### Neutral
- **Ink Black** (#16181d): All headings and primary reading text. A near-black, not a true black — it sits on warm paper without vibrating.
- **Paper White** (#ffffff): The default section stock.
- **Paper Sand** (#f6f4f0): The alternate section stock and the footer's legal strip. The warmth is the point: it reads as paper, not as a grey UI surface.
- **Paper Sand Deep** (#efece6): Image placeholder ground, visible only while media loads or when a post has no artwork.
- **Column Grey** (#5a5f66): Secondary reading text — card excerpts, list descriptions — and the uppercase section eyebrows.
- **Meta Grey** (#686e74): Bylines, dates, ad labels, footer legal. The quietest text in the system — and the darkest it can be while staying quiet, since it must clear 4.5:1 on both paper stocks.
- **Hairline Grey** (#e5e2dc): Every rule, divider and border in the system. One value, one weight.

### Named Rules

**The One Raised Voice Rule.** Press Magenta appears on no more than ~5% of any viewport. If a screen has more than one magenta *fill* competing for attention, one of them is wrong. Rarity is the mechanism; dilute it and the subscribe button stops meaning anything.

**The Two-Paper Rule.** Sections are separated by alternating full-bleed stock — Paper White against Paper Sand — and by nothing else. Never wrap a section in a box, a border, or a card to signal that it is a section.

**The Achromatic Default Rule.** Any element whose colour has not been decided is Ink Black on paper. Colour is opt-in and must be justified by a role above.

## Typography

**Display Font:** Arvo (with Rockwell, Roboto Slab, Georgia)
**Body Font:** Source Serif 4 (with Source Serif Pro, Georgia, Times New Roman)
**Label/UI Font:** Inter (with the system sans stack)

**Character:** A slab serif that hits like set metal, over a text serif built for long reading on screen, over a neutral sans that never editorialises. The pairing is deliberately unglamorous — Arvo's square slabs and even colour give headlines weight without elegance-signalling, which is exactly right for a trade title that reports rather than seduces.

### Hierarchy
- **Display** (Arvo 700, clamp(1.6rem, 2.9vw, 2.25rem), 1.15, -0.01em): The lead story headline, one per page at most.
- **Headline** (Arvo 700, clamp(1.7rem, 3.4vw, 2.5rem), 1.18, -0.01em): Article and single-entry titles.
- **Title** (Arvo 700, 1.0625rem, 1.3, -0.01em): Card headlines across every grid.
- **Eyebrow** (Inter 400, clamp(1.0625rem, 1.9vw, 1.5rem), 0.1em, uppercase, Column Grey): Section headers. The one place a large size carries a light weight — it names the section without competing with the stories inside it.
- **Body** (Source Serif 4 400, 1.0625rem, 1.75): Article text, capped at a 780px measure.
- **Body Small** (Source Serif 4 400, 0.875rem, 1.65, Column Grey): Card excerpts and list descriptions, clamped to 4 lines on cards and 2 in lists so meta rows across a row share a baseline.
- **Label** (Inter 500, 0.6875rem, 0.11em, uppercase, Press Magenta): Category tags and the paywall badge.
- **Meta** (Inter 400, 0.75rem, Meta Grey): Bylines, dates, ad labels, legal.

### Named Rules

**The Three Voices Rule.** Arvo names, Source Serif 4 tells, Inter labels and operates. Every string on the page must be one of those three things. If you cannot say which, the element is not designed yet.

**The Slab Restraint Rule.** Arvo ships only 400 and 700 — never request another weight, or the browser synthesises a faux bold. Arvo is never uppercased and never given positive tracking; uppercase and tracking belong to Inter.

**The Serif Reads, Sans Operates Rule.** Anything a person reads for meaning is Source Serif 4. Anything a person acts on or scans for orientation — buttons, nav, dates, tags, form fields — is Inter. A byline is not reading; it is Inter.

## Layout

The page is a stack of full-bleed horizontal bands. Each band spans the viewport, carries its own stock colour and its own vertical padding (`clamp(48px, 6vw, 84px)`), and centres its content on a 1180px column with a `clamp(20px, 4vw, 40px)` gutter. Bands sit flush against one another with no gap; the change of stock is the seam, and no band draws a border on that seam. There are two vertical intervals and no others: `--gd-section-y` for editorial bands, and `--gd-section-y-tight` (`clamp(32px, 4vw, 52px)`) for the two utility bands — the newsletter and the advertisement — plus the hero's top, which compresses because the header already sits above it.

Inside the column there is exactly one grid module: **three equal tracks with a `clamp(24px, 3vw, 40px)` gutter**. Every arrangement on the page is a span of that module, so vertical gridlines run unbroken from the header to the footer. The **card grid** fills all three tracks. The **hero** is the same module with the lead story spanning two tracks and the aside taking the third — which is why the aside aligns exactly with the third card of the band below it. That aside carries a teaser card *plus* continuing headlines as an entry list, because a lead story runs roughly 650px and a single teaser only 400px; the list is what keeps the third track from ending 250px short of the column beside it. The **column grid** (a list, an advertisement, another list) fills three tracks, and a two-card child inside it spans two.

Density is deliberately low. Vertical air between bands is generous, cards are separated by real gutters rather than borders, and long-form text is pulled back to a 780px measure even though the grid is 1180px wide.

Responsive behaviour collapses in three steps: at **980px** the hero stacks and both grids drop to two columns; at **782px** the header rearranges (wordmark left, search and account right, navigation on its own row) and the footer stacks left-aligned; at **640px** every grid becomes a single column and the header's subscribe button steps aside so the search field keeps a usable width. A fourth breakpoint at **1560px** governs only the skyscraper advertisement, which appears solely when it fits beside the content column without crowding it.

### Named Rules

**The One Module Rule.** Every column on the page is a span of the same three-track grid at the same gutter. A layout that needs its own proportion is expressed as a span (2 + 1), never as a second grid with a different gutter — two column rhythms on one page is the defect this system exists to prevent.

**The Full-Bleed Band Rule. Every section is full width and paints its own background; content is centred at 1180px inside it. Never build a section as a floating 1180px block on a shared page background.

**The Hairline Rule.** Structural separation is drawn with 1px Hairline Grey rules and nothing else — no double rules, no thicker weights, no coloured dividers.

**The Reading Measure Rule.** Body copy never exceeds 780px (`--gd-measure`), regardless of how wide the grid around it is. On the article view only the hero image is allowed to break that measure, and it breaks it completely — full bleed, never an in-between width.

## Elevation & Depth

The system is flat. There are no shadows on the page plane and no elevation scale: depth is communicated entirely through tonal bands (Paper White against Paper Sand, interrupted once by Deep Slate Teal) and 1px hairlines. Cards, images, buttons, chips, form fields and advertisements all sit directly on the sheet.

One exception exists, and it is defined by behaviour rather than style: elements that genuinely leave the page plane — the navigation submenu, and any future dropdown, popover or dialog — carry a single ambient shadow to signal that they are floating above the sheet rather than printed on it.

### Shadow Vocabulary
- **Floating overlay** (`box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08)`): The only shadow in the system. Applies exclusively to transient overlays that appear above the page and disappear again.

### Named Rules

**The Page-Plane Rule.** If it does not disappear when you look away, it does not get a shadow. Cards, images, buttons, chips, inputs and ads are printed on the sheet, not resting on it.

## Shapes

Two radii, chosen for opposite reasons, with nothing in between.

Everything that holds content is **square** (0px): cards, images, the paywall badge, section bands, the advertisement frames. Squared corners are what make the grid read as a typeset page rather than an assembled interface, and the absence of a mid-range radius is what keeps it from drifting toward product-UI language.

Everything that is an **action** is fully round (999px): buttons, filter chips, the filter-form controls. The pill is the system's only soft shape, which is precisely why a pill reads unambiguously as "you can press this."

Form fields take a token 2px — enough to signal an editable field by platform convention, small enough to stay in the square family. The floating navigation submenu shares that same 2px, being the only other element allowed to soften a corner at all.

Borders are always 1px Hairline Grey, and images are never masked, feathered or given aspect-ratio tricks beyond a straight `16/9` crop (`3/2` for the hero's sidebar teaser).

### Named Rules

**The Square Corner Rule.** 0px or 999px. There is no 8px, no 12px, no "slightly rounded". A mid-range radius anywhere in this system is a bug.

**The Pill Means Press Rule.** Round shapes are reserved for interactive controls. Never set a static container, badge or image in a pill.

## Components

### Buttons
- **Shape:** Fully round pill (999px), never square.
- **Primary:** Press Magenta fill with a matching 1px border, Paper White text, Inter 500 at 0.875rem, padding 0.7rem 1.6rem, `white-space: nowrap` so labels never break across two lines in a tight header.
- **Hover / Focus:** Background and border shift to Press Magenta Deep over 0.2s ease. No lift, no scale, no shadow.
- **There is no secondary button.** Where a lesser action is needed, use an arrow link (`→ Alle News`, Inter 0.8125rem in Press Magenta) rather than inventing an outline variant.

### Chips
- **Style:** Pill (999px) with a 1px Hairline Grey border on Paper White, Column Grey text at Inter 0.8125rem, padding 0.42rem 1.15rem.
- **Hover:** Border and text both shift to Press Magenta; the fill stays white.
- **Selected:** Press Magenta fill and border, Paper White text. Exactly one chip in a row is ever selected.

### Cards / Containers
- **Corner Style:** Square (0px).
- **Background:** None. The card inherits the band's stock.
- **Shadow Strategy:** None — see Elevation & Depth.
- **Border:** None.
- **Internal Padding:** None on the card; 18px above the text block only.
- **Structure:** A `16/9` media crop over a flex column — title, excerpt, then a meta row pinned to the bottom with `margin-top: auto` so meta baselines align across a row of unequal cards. The image scales to 1.04 over 0.5s on card hover; nothing else moves.
- **Meta row:** Byline and date left in Meta Grey, category right in Press Magenta label caps, space-between, wrapping to a second line rather than truncating.

### Inputs / Fields
- **Style:** 1px Hairline Grey border, Paper White fill, 2px radius, padding 0.6rem 0.9rem, Inter 0.9375rem.
- **Focus:** 2px Press Magenta outline at 1px offset. The header search is the exception — it is chromeless (no border, no fill) and reveals a single hairline under the input on focus.
- **Search:** Icon-first via `row-reverse`, magnifier in Press Magenta, placeholder set in Ink Black so it reads as a label rather than as ghost text.

### Navigation
- **Style:** Inter 0.9375rem in Ink Black on a sticky Paper White bar, centred beneath a centred wordmark, with the search left and subscribe plus account right.
- **Active:** Press Magenta text over a 2px Press Magenta bottom border. Hover is a colour shift only.
- **Submenu:** Paper White, 1px Hairline Grey border, 2px radius, and the system's single floating-overlay shadow.
- **Mobile (≤782px):** Wordmark moves left, search and account go right, the navigation collapses to a hamburger on its own row. Below 640px the subscribe button steps aside so the search keeps a usable width.

### Section Header
The recurring device that opens every band: an uppercase Inter eyebrow in Column Grey on the left, and an optional arrow link (`→ Zum Magazin`) in Press Magenta on the right, baseline-aligned, wrapping on narrow screens. A column-level variant swaps the eyebrow for an Arvo 700 title at 1.25rem where a heading sits inside a grid track rather than above the band.

### Article Detail
The reading surface narrows to a **780px measure** (`--gd-measure`) inside the 1180px column, and only the hero image breaks it.

- **Entry head:** a magenta category and grey section label in Inter caps, the Arvo title, an upright serif dek at 1.0625–1.1875rem in Column Grey, then a byline row bounded above and below by hairlines — author and date left, `Teilen` / `Drucken` right.
- **Hero media:** full-bleed at a `9/4` letterbox crop (`3/2` below 640px) so a portrait upload cannot swallow the viewport; its caption returns to the 780px measure in Meta Grey.
- **Pull quote:** the one place the accent draws a rule — a 2px Press Magenta left border, italic at 1.0625–1.25rem, with the attribution in Inter caps beneath.
- **Note box:** a factual aside on Paper Sand (`is-style-goldor-note`), its first line set in Inter 600 as the label.
- **Lists:** unordered items take an en dash in Meta Grey, ordered items a counter in Inter — never browser bullets.
- **Author box:** Paper Sand panel, round 64px avatar, magenta eyebrow, Arvo name, bio, arrow link. A 2px magenta mark sits at its top-right corner.
- **Reading progress:** a 3px Press Magenta bar fixed to the top of the viewport, scaled by scroll position and removed entirely under `prefers-reduced-motion`.

### Entry List
The compact alternative to cards, used for jobs, classifieds and calendar dates: a hairline-topped list where each row carries an Arvo 700 title at 0.9375rem, a meta line of date plus source in Inter 0.75rem, and — for events — a Press Magenta date range instead of grey. Rows are separated by hairlines, never by background fills or zebra striping.

## Do's and Don'ts

### Do:
- **Do** build every new section as a full-bleed band with its own stock, alternating Paper White and Paper Sand, and centre its content at 1180px.
- **Do** keep the three typefaces in their lanes: Arvo names, Source Serif 4 tells, Inter labels and operates.
- **Do** use 0px or 999px and nothing between.
- **Do** separate things with 1px Hairline Grey rules and generous gutters.
- **Do** pin card meta rows to the bottom with `margin-top: auto` so a row of cards shares one meta baseline.
- **Do** clamp card excerpts (4 lines) and list descriptions (2 lines) so grids stay even against real editorial copy of unpredictable length.
- **Do** treat advertising as typeset page furniture — a Meta Grey "ANZEIGE" label above the creative, sitting in the grid like everything else.
- **Do** hold body copy to a 780px measure even inside the 1180px column.
- **Do** keep German and French equal: never design a layout that only survives the shorter of two translations.

### Don't:
- **Don't** add a shadow to anything that stays on the page. Cards, images, buttons, chips, inputs and ads are printed, not floating.
- **Don't** introduce a mid-range border radius. There is no 8px in this system.
- **Don't** let Press Magenta exceed roughly 5% of a viewport, and never use it as a section background or a heading colour.
- **Don't** request an Arvo weight other than 400 or 700 — anything else renders as a synthesised faux bold.
- **Don't** uppercase or positively track Arvo; that register belongs to Inter.
- **Don't** wrap a group of items in a box, panel or card to show they belong together. Change the stock or add a hairline.
- **Don't** reach for gradients, illustrated spot graphics or rounded shadowed cards — that is the SaaS register this system rejects.
- **Don't** build boxed teaser modules or undifferentiated grids of equal-weight stories; every band states its hierarchy before its content.
- **Don't** put reading text in Inter or interface text in Source Serif 4.
