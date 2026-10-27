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
    fontSize: "clamp(2.5rem, 5.2vw, 3.75rem)"
    fontWeight: 700
    lineHeight: 1.02
    letterSpacing: "-0.02em"
  headline:
    fontFamily: "Arvo, Rockwell, 'Roboto Slab', Georgia, serif"
    fontSize: "clamp(2rem, 4vw, 2.75rem)"
    fontWeight: 700
    lineHeight: 1.06
    letterSpacing: "-0.015em"
  section:
    fontFamily: "Arvo, Rockwell, 'Roboto Slab', Georgia, serif"
    fontSize: "clamp(1.625rem, 3vw, 2rem)"
    fontWeight: 700
    lineHeight: 1.1
    letterSpacing: "-0.01em"
  title:
    fontFamily: "Arvo, Rockwell, 'Roboto Slab', Georgia, serif"
    fontSize: "1.375rem"
    fontWeight: 700
    lineHeight: 1.15
    letterSpacing: "-0.005em"
  list-title:
    fontFamily: "Arvo, Rockwell, 'Roboto Slab', Georgia, serif"
    fontSize: "1.125rem"
    fontWeight: 700
    lineHeight: 1.25
    letterSpacing: "-0.005em"
  body:
    fontFamily: "Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif"
    fontSize: "1.0625rem"
    fontWeight: 400
    lineHeight: 1.65
    letterSpacing: "normal"
  body-small:
    fontFamily: "Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif"
    fontSize: "0.9375rem"
    fontWeight: 400
    lineHeight: 1.55
    letterSpacing: "normal"
  label:
    fontFamily: "Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif"
    fontSize: "0.8125rem"
    fontWeight: 500
    lineHeight: 1.4
    letterSpacing: "normal"
  meta:
    fontFamily: "Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif"
    fontSize: "0.8125rem"
    fontWeight: 400
    lineHeight: 1.4
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
  measure: "680px"
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
  button-secondary:
    backgroundColor: "transparent"
    textColor: "{colors.ink-black}"
    typography: "{typography.button}"
    rounded: "{rounded.input}"
    padding: "0.75rem 1.4rem"
  button-secondary-hover:
    backgroundColor: "{colors.ink-black}"
    textColor: "{colors.paper-white}"
  tab-filter:
    textColor: "{colors.meta-grey}"
    typography: "{typography.label}"
    padding: "12px 0"
  tab-filter-active:
    textColor: "{colors.ink-black}"
    padding: "12px 0"
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
    textColor: "{colors.press-magenta-deep}"
    typography: "{typography.label}"
  badge-paywall:
    backgroundColor: "{colors.press-magenta}"
    textColor: "{colors.paper-white}"
    typography: "{typography.label}"
    rounded: "{rounded.square}"
    padding: "6px 8px"
---

# Design System: Gold'Or

## Overview

**Creative North Star: "The Workbench Broadsheet"**

Gold'Or is trade press for people who work with their hands at a bench. The system is set like a broadsheet and behaves like ink on paper: full-width bands of stock, hairline rules, square corners, columns that hold their measure. Nothing is rendered as a floating object, because nothing on a printed sheet floats. Depth is a change of paper, not a change of altitude.

The philosophy is restrained and exact. Authority here comes from precision and consistency, never from decoration — the design's job is to get out of the way of trade information and then be impeccable about how that information is set. Two typefaces, as in print and the newsletter: Arvo Bold names things, large; Inter carries everything else, from reading text to labels. Press Magenta is the single raised voice in an otherwise achromatic system, and it earns that by being rare.

Two rejections are binding. This is not a SaaS product site: no gradients, no drop-shadowed rounded cards, no illustrated spot graphics. And it is not a generic news portal: no boxed modules, no teaser grids without hierarchy, no ad clutter competing with editorial. Advertising is house-sold and set like the rest of the page.

**Key Characteristics:**
- Sections opened by an Arvo title over a 2px ink rule, as in the newsletter; Paper Sand only where a section should stand apart
- Square corners everywhere; the fully-round pill reserved for the one main action per view
- Zero shadows on the page plane — depth is tonal, structure is hairline
- Slab-serif headlines, large, over Inter for reading and interface alike
- One accent colour, used sparingly enough that it always means something

## Colors

An achromatic press palette — warm off-white paper, near-black ink, three greys — interrupted by exactly one saturated colour and grounded once by a single dark field.

### Primary
- **Press Magenta** (#e6007e): The brand's inherited voice, carried by the wordmark, the favicon and the login screen. On the page it is a *surface* colour only: the main-action pill, the paywall badge, the active-tab underline, the focus ring. Never a section background, never text — on Paper Sand it falls to 4.1:1.
- **Press Magenta Deep** (#c30069): Magenta as *text*: categories, inline links, hover on titles and links, and the hover fill of the pill. 5.4:1 on Paper Sand, so small type stays legible on both stocks.

### Secondary
- **Deep Slate Teal** (#0e3742): Petrol means *service*, as in the newsletter's "Inserieren" and "Stellenanzeiger" blocks: the subscription band, and later a service bar. Never editorial content. Magenta on Petrol is 2.8:1 — never put magenta text on it.

### Neutral
- **Ink Black** (#16181d): All headings and primary reading text. A near-black, not a true black — it sits on warm paper without vibrating.
- **Paper White** (#ffffff): The default section stock.
- **Paper Sand** (#f6f4f0): The alternate section stock and the footer's legal strip. The warmth is the point: it reads as paper, not as a grey UI surface.
- **Paper Sand Deep** (#efece6): Image placeholder ground, and the stock of the typographic fallback panel when a post has no artwork.
- **Column Grey** (#5a5f66): Secondary reading text — card excerpts, list descriptions, the article dek.
- **Meta Grey** (#686e74): Bylines, dates, ad labels, footer legal. The quietest text in the system — and the darkest it can be while staying quiet, since it must clear 4.5:1 on both paper stocks.
- **Hairline Grey** (#e5e2dc): Every rule, divider and border in the system. One value, one weight.

### Named Rules

**The One Raised Voice Rule.** Press Magenta appears on no more than ~5% of any viewport. If a screen has more than one magenta *fill* competing for attention, one of them is wrong. Rarity is the mechanism; dilute it and the subscribe button stops meaning anything.

**The Sparing Sand Rule.** A section is opened by its title over a 2px Ink Black rule. Paper Sand is used only where a section should deliberately stand apart (jobs and classifieds, people and fairs), not alternated by habit. Never wrap a section in a box, a border, or a card to signal that it is a section.

**The Achromatic Default Rule.** Any element whose colour has not been decided is Ink Black on paper. Colour is opt-in and must be justified by a role above.

## Typography

**Display Font:** Arvo, Bold only (with Rockwell, Roboto Slab, Georgia)
**Body and UI Font:** Inter (with the system sans stack)

**Character:** A slab serif that hits like set metal, over a neutral sans that never editorialises — the same two faces as the printed magazine and the newsletter. Arvo lives on size: at 17px on a card it reads like a blog theme, from 22px up it has presence. So it is set bold, large, tightly leaded and slightly negatively tracked, and everything that is not a headline is Inter.

### Hierarchy
- **Display** (Arvo 700, clamp(2.5rem, 5.2vw, 3.75rem), 1.02, -0.02em): The lead story headline, one per page at most.
- **Headline** (Arvo 700, clamp(2rem, 4vw, 2.75rem), 1.06, -0.015em): Article and single-entry titles.
- **Section** (Arvo 700, clamp(1.625rem, 3vw, 2rem), 1.1, -0.01em): Section titles over the 2px rule, archive titles.
- **Title** (Arvo 700, 1.375rem, 1.15): Card headlines across every grid.
- **List Title** (Arvo 700, 1.125rem, 1.25): Jobs, classifieds, news lists.
- **Body** (Inter 400, 1.0625rem, 1.65): Article text, capped at a 680px measure (about 65 characters).
- **Body Small** (Inter 400, 0.9375rem, 1.55, Column Grey): Card excerpts (clamped to 3 lines) and list descriptions (2 lines), so meta rows across a row share a baseline.
- **Label** (Inter 500, 0.8125rem, Press Magenta Deep): Category tags, breadcrumbs, eyebrows — in normal case.
- **Meta** (Inter 400, 0.8125rem, Meta Grey): Bylines, dates, ad labels, legal.

### Named Rules

**The Two Voices Rule.** Arvo names, Inter does everything else. Every string on the page is either a headline or it is Inter.

**The Slab Restraint Rule.** Arvo is set in 700 only and never below ~18px. It is never uppercased and never given positive tracking.

**The Normal Case Rule.** Categories, eyebrows and labels are set in normal case, not tracked capitals: calmer, easier to read, less template.

**The Hyphenation Rule.** Body text hyphenates (`hyphens: auto`, with WPML setting `lang` to de or fr). Headlines don't: they use `hyphens: manual` and `text-wrap: balance`.

## Layout

The page is a stack of full-bleed horizontal bands. Each band spans the viewport, carries its own stock colour and its own vertical padding (`clamp(48px, 6vw, 84px)`), and centres its content on a 1180px column with a `clamp(20px, 4vw, 40px)` gutter. Bands sit flush against one another with no gap; the change of stock is the seam, and no band draws a border on that seam. There are two vertical intervals and no others: `--gd-section-y` for editorial bands, and `--gd-section-y-tight` (`clamp(32px, 4vw, 52px)`) for the two utility bands — the newsletter and the advertisement — plus the hero's top, which compresses because the header already sits above it.

Inside the column there is exactly one grid module: **three equal tracks with a `clamp(24px, 3vw, 40px)` gutter**. Every arrangement on the page is a span of that module, so vertical gridlines run unbroken from the header to the footer. The **card grid** fills all three tracks. The **hero** is the same module with the lead story spanning two tracks and the aside taking the third — which is why the aside aligns exactly with the third card of the band below it. That aside carries a teaser card *plus* continuing headlines as an entry list, because a lead story runs roughly 650px and a single teaser only 400px; the list is what keeps the third track from ending 250px short of the column beside it. The **column grid** (a list, an advertisement, another list) fills three tracks, and a two-card child inside it spans two.

Density is deliberately low. Vertical air between bands is generous, cards are separated by real gutters rather than borders, and long-form text is pulled back to a 680px measure even though the grid is 1180px wide.

Responsive behaviour collapses in three steps: at **980px** the hero stacks and both grids drop to two columns; at **782px** the header rearranges (wordmark left, search and account right, navigation on its own row) and the footer stacks left-aligned; at **640px** every grid becomes a single column and the header's subscribe button steps aside so the search field keeps a usable width. A fourth breakpoint at **1560px** governs only the skyscraper advertisement, which appears solely when it fits beside the content column without crowding it.

### Named Rules

**The One Module Rule.** Every column on the page is a span of the same three-track grid at the same gutter. A layout that needs its own proportion is expressed as a span (2 + 1), never as a second grid with a different gutter — two column rhythms on one page is the defect this system exists to prevent.

**The Full-Bleed Band Rule. Every section is full width and paints its own background; content is centred at 1180px inside it. Never build a section as a floating 1180px block on a shared page background.

**The Hairline Rule.** Structural separation is drawn with 1px Hairline Grey rules. The one heavier weight is the 2px Ink Black rule under a section title, which opens a section the way it does in the newsletter. No double rules, no coloured dividers.

**The Reading Measure Rule.** Body copy never exceeds 680px (`--gd-measure`), regardless of how wide the grid around it is. On the article view only the hero image is allowed to break that measure, and it breaks it completely — full bleed, never an in-between width.

## Elevation & Depth

The system is flat. There are no shadows on the page plane and no elevation scale: depth is communicated entirely through tonal bands (Paper White against Paper Sand, interrupted once by Deep Slate Teal) and 1px hairlines. Cards, images, buttons, chips, form fields and advertisements all sit directly on the sheet.

One exception exists, and it is defined by behaviour rather than style: elements that genuinely leave the page plane — the navigation submenu, and any future dropdown, popover or dialog — carry a single ambient shadow to signal that they are floating above the sheet rather than printed on it.

### Shadow Vocabulary
- **Floating overlay** (`box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08)`): The only shadow in the system. Applies exclusively to transient overlays that appear above the page and disappear again.
- **Printed cover** (`rotate(-3deg)`, `box-shadow: 0 10px 18px -8px rgba(0, 0, 0, 0.6)`): The one object on the page, and the only one allowed to tilt: the newest issue's cover in the subscription band (`goldor/issue-cover`). It is the physical magazine lying on the petrol band, which is what tells the reader the Abo is a printed magazine and not just a newsletter. It is hidden on narrow screens and used nowhere else.

### Named Rules

**The Page-Plane Rule.** If it does not disappear when you look away, it does not get a shadow. Cards, images, buttons, chips, inputs and ads are printed on the sheet, not resting on it.

## Shapes

Two radii, chosen for opposite reasons, with nothing in between.

Everything that holds content is **square** (0px): cards, images, the paywall badge, section bands, the advertisement frames. Squared corners are what make the grid read as a typeset page rather than an assembled interface, and the absence of a mid-range radius is what keeps it from drifting toward product-UI language.

The **main action** of a view is fully round (999px): "Abonnieren" and its equals, one per view. The pill is established in the newsletter; kept rare, it keeps its weight. Secondary actions (form submits, filter buttons, "Inserat aufgeben", iCal, "Website besuchen") are square at the inputs' 2px and outlined in ink.

Form fields take a token 2px — enough to signal an editable field by platform convention, small enough to stay in the square family. They are the only element allowed to soften a corner at all; the navigation submenu band stays square.

Borders are always 1px Hairline Grey, and images are never masked or feathered. Crops are fixed per role: cards `4/3`, the lead story `16/10`, portraits `3/4`. Cut-out product shots (file name contains "freigestellt") are not cropped at all: they sit whole on Paper White with 8% air and a hairline frame.

### Named Rules

**The Square Corner Rule.** 0px, 2px for inputs and secondary buttons, or 999px for the main action. There is no 8px, no 12px, no "slightly rounded".

**The Rare Pill Rule.** One pill per view, for the main action. If a second pill appears, one of them is a secondary action and should be square.

## Components

### Buttons and links
- **Main action:** Press Magenta pill (999px) with a matching 1px border, Paper White text, Inter 500 at 0.875rem, padding 0.7rem 1.6rem, `white-space: nowrap`. Hover shifts to Press Magenta Deep over 0.2s. No lift, no scale, no shadow. At most one per view.
- **Secondary action** (`.goldor-button--secondary`, block style "Nebenaktion", Ninja Forms submit, `.button-filter`): square at 2px, transparent with a 1px Ink Black border and Ink Black text; on hover it fills Ink Black with white text.
- **Follow-on links** ("Alle News", "Zum Magazin"): Inter 500 at 0.9375rem in Ink Black, underlined with a 1px rule that thickens to 2px and turns Press Magenta Deep on hover. No arrow.
- Cards are clickable as a whole through title and image; there is no separate "Weiterlesen" button.

### Filter tabs
- Category filters are tabs on a hairline, not pills: Inter 500 at 0.9375rem in Meta Grey, 26px apart. Hover turns the label Ink Black; the selected tab is Ink Black over a 2px Press Magenta underline.

### Cards / Containers
- **Corner Style:** Square (0px).
- **Background:** None. The card inherits the band's stock.
- **Shadow Strategy:** None — see Elevation & Depth.
- **Border:** None.
- **Internal Padding:** None on the card; 16px above the text block only.
- **Structure:** A `4/3` media crop over a flex column — Arvo title at 1.375rem, Inter excerpt, then a meta row pinned to the bottom with `margin-top: auto` so meta baselines align across a row of unequal cards. On hover the title turns Press Magenta Deep and the image scales to 1.03; nothing else moves, and nothing animates in on scroll.
- **Meta row:** Byline and date left in Meta Grey, category right in Press Magenta Deep, normal case, space-between, wrapping rather than truncating. Jobs, classifieds and directory entries show no byline: they are entered by the office account.
- **No image:** a typographic panel on Paper Sand Deep — the category in Arvo, Press Magenta Deep, top left; a small faded wordmark bottom left. Never a grey box with a logo, which reads as a missing picture.

### Inputs / Fields
- **Style:** 1px Hairline Grey border, Paper White fill, 2px radius, padding 0.6rem 0.9rem, Inter 0.9375rem.
- **Focus:** 2px Press Magenta outline at 1px offset. The header search is the exception — it is chromeless (no border, no fill) and reveals a single hairline under the input on focus.
- **Search:** Icon-first via `row-reverse`, magnifier in Press Magenta, placeholder set in Ink Black so it reads as a label rather than as ghost text.

### Navigation
- **Style:** Inter 0.9375rem in Ink Black on a sticky Paper White bar, centred beneath a centred wordmark, with the search left and subscribe plus account right.
- **Active:** Press Magenta text over a 2px Press Magenta bottom border. Hover is a colour shift only.
- **Submenu (≥600px):** a full-bleed Paper White band that drops flush from the header rule, square, framed by Hairline Grey rules top and bottom, carrying the system's single floating-overlay shadow. Children sit in one centred row in Inter 0.875rem with the same gap as the main nav; the current child takes the 2px Press Magenta underline. The parent turns magenta and its chevron flips while the band is open. It opens at once and closes after a short beat, so a diagonal pass to a child does not drop it.
- **Mobile (≤782px):** Wordmark moves left, search and account go right, the navigation collapses to a hamburger on its own row. Below 640px the subscribe button steps aside so the search keeps a usable width.

### Section Header
The recurring device that opens every section, taken from the newsletter: an Arvo 700 section title on the left and an optional follow-on link ("Zum Magazin") on the right, baseline-aligned over a 2px Ink Black rule, wrapping on narrow screens. A column-level variant sets an Arvo title at 1.5rem without the rule where a heading sits inside a grid track rather than above the band.

### Article Detail
The reading surface narrows to a **680px measure** (`--gd-measure`) inside the 1180px column, and only the hero image breaks it.

- **Entry head:** a Press Magenta Deep category and grey section label in Inter, normal case, the Arvo headline, a dek at 1.0625–1.1875rem in Column Grey, then a byline row bounded above and below by hairlines — author and date left, `Teilen` / `Drucken` right.
- **Hero media:** full-bleed at a `9/4` letterbox crop (`3/2` below 640px) so a portrait upload cannot swallow the viewport; its caption returns to the 680px measure in Meta Grey.
- **Pull quote:** the one place the accent draws a rule — a 2px Press Magenta left border, italic at 1.0625–1.25rem, with the attribution in Inter beneath.
- **Note box:** a factual aside on Paper Sand (`is-style-goldor-note`), its first line set in Inter 600 as the label.
- **Lists:** unordered items take an en dash in Meta Grey, ordered items a counter in Inter — never browser bullets.
- **Author box:** Paper Sand panel, round 64px avatar, magenta eyebrow, Arvo name, bio, arrow link. A 2px magenta mark sits at its top-right corner.
- **Reading progress:** a 3px Press Magenta bar fixed to the top of the viewport, scaled by scroll position and removed entirely under `prefers-reduced-motion`.

### Entry List
The compact alternative to cards, used for jobs, classifieds and calendar dates: a hairline-topped list where each row carries an Arvo 700 title at 1.125rem, a meta line of date (plus author, for editorial posts only) in Inter 0.8125rem, and — for events — a Press Magenta Deep date range instead of grey. Rows are separated by hairlines, never by background fills or zebra striping.

## Do's and Don'ts

### Do:
- **Do** build every new section as a full-bleed band, open it with an Arvo title over the 2px rule, and centre its content at 1180px. Use Paper Sand only where the section should stand apart.
- **Do** keep the two typefaces in their lanes: Arvo Bold for headlines from ~18px up, Inter for everything else.
- **Do** use 0px, 2px (inputs, secondary buttons) or 999px (the main action) and nothing between.
- **Do** separate things with 1px Hairline Grey rules and generous gutters.
- **Do** pin card meta rows to the bottom with `margin-top: auto` so a row of cards shares one meta baseline.
- **Do** clamp card excerpts (3 lines) and list descriptions (2 lines) so grids stay even against real editorial copy of unpredictable length.
- **Do** treat advertising as typeset page furniture — a Meta Grey "Anzeige" label above the creative, sitting in the grid like everything else. When no ad is booked, the slot disappears and its neighbours close the gap.
- **Do** hold body copy to a 680px measure even inside the 1180px column.
- **Do** keep German and French equal: never design a layout that only survives the shorter of two translations.

### Don't:
- **Don't** add a shadow to anything that stays on the page. Cards, images, buttons, chips, inputs and ads are printed, not floating.
- **Don't** introduce a mid-range border radius. There is no 8px in this system.
- **Don't** let Press Magenta exceed roughly 5% of a viewport, never use it as a section background or a heading colour, and never set small text in the bright Magenta — text takes Press Magenta Deep.
- **Don't** set Arvo in anything but 700, or below ~18px.
- **Don't** set labels in tracked capitals; categories and eyebrows are normal case.
- **Don't** wrap a group of items in a box, panel or card to show they belong together. Change the stock or add a hairline.
- **Don't** reach for gradients, illustrated spot graphics or rounded shadowed cards — that is the SaaS register this system rejects.
- **Don't** build boxed teaser modules or undifferentiated grids of equal-weight stories; every band states its hierarchy before its content.
- **Don't** scatter pills: a second pill in one view means one of them is a secondary action.
