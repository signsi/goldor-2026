# Product

<!-- impeccable:product-schema 1 -->

## Platform

web

## Users

**Primary: paying subscribers.** Roughly 1,290 WordPress subscriber accounts, created with the Abo. They read the paywalled `artikel` archive and the e-paper issues in the weeks *between* the nine printed numbers. The website is the digital half of the CHF 96 subscription, not a separate product — when audiences conflict, the subscriber's reading experience wins.

**Secondary: the wider Swiss trade.** Bijoutiers and Juweliere, Juwelenfasser and Graveure, gold- and silversmiths, watchmakers, gem dealers, and jewellery/watch producers — subscribers or not. They use the open areas (News, Kalender, Jobs, Marktplatz, Lieferanten, Wiki) as the sector's working reference and return for them independently of the magazine.

**Tertiary: Inserenten and Fachverbände.** Advertisers booking Leaderboard, Skyscraper, Rectangle and Advertorial placements, plus trade associations and the Branchen-Nachwuchs using Gold'Or as a platform. Confirmed as a real audience whose commercial weight is expected to grow, but not today's primary design constraint.

## Product Purpose

Gold'Or is an independent Swiss trade magazine for the watch and jewellery industry. Print is the flagship: nine issues a year, bilingual German and French, circulation 2,500. An annual subscription costs CHF 96 and includes the nine print issues plus login credentials for the online magazine. A free Probeabo gives a sample print copy and 30 days of provisional online access.

The website carries three jobs at once, in priority order:

1. **Serve the subscription** — deliver the gated magazine archive and e-paper so the CHF 96 visibly covers more than nine printed issues.
2. **Sell the subscription** — convert readers arriving from search and newsletter into Abo and Probeabo orders via `/goldor-bestellen/`.
3. **Hold the industry's habit** — be the place the trade checks weekly for fair dates, jobs and classifieds, whether or not they subscribe.

Advertising and paid listing revenue is a real and accepted fourth outcome, expected to matter more over time.

## Positioning

The only trade magazine in Switzerland for the watch and jewellery industry ("die einzige Fachzeitschrift der Schweiz für die Uhren- und Schmuckbranche"), and editorially independent of any manufacturer, retailer or association.

Two things a neighbouring publication could not truthfully copy:

- **Genuine bilingual reach.** A Westschweizer Redaktion based in Neuchâtel produces for the Romandie, so French is original reporting rather than translated German.
- **Sprachrohr role.** Gold'Or explicitly positions itself as the voice of the practising trade *and* as an open platform for the Fachverbände and the Branchen-Nachwuchs to raise their own concerns — a participatory stance, not just coverage of the industry.

## Operating Context

- **Print sets the rhythm.** Nine issues a year; the site's job is the interval between them. The `magazin` archive and e-paper are tied to that publishing cadence.
- **Verlag and Redaktion.** Head office in Baar (ZG): a Verlagsleiterin, a Verlags-Assistentin and two journalists. A Westschweizer Redaktion in Neuchâtel. Supported by Fachautoren in gemmology, marketing, and science/watches.
- **Readers are working professionals** at the bench and in the shop — retail jewellers, workshops, watchmakers, gem dealers, producers — reading around a working day, not at leisure.
- **The trade-fair calendar is a real seasonal spine**: Inhorgenta, Vicenzaoro / T.Gold, Inova Collection, the Bangkok and Hong Kong gem fairs, Tucson. Events carry start date, end date and location, and are exportable as `.ics`.
- **Jobs and Marktplatz are placed by trade businesses**, split into Stellenangebote and Stellengesuche; Kleinanzeigen cover premises, succession, workshops and stock.
- **Participation is solicited.** The About page actively asks readers to write or call in with topics and information.

## Capabilities and Constraints

**Platform.** WordPress block theme (`goldor-2026`), full-site editing, dynamic blocks under `inc/blocks/`. Legacy classic-theme code is retained under `legacy/` and is not the live implementation.

**Content types.** `post` (News), `artikel` (magazine articles, paywalled), `print` (forced to private on publish), `vsgu-news` (Personen), `magazin` (issues, with `epaper`), `kalender` (events with `startdatum`/`enddatum`/`ort` and iCal export), `job`, `kleinanzeige`, `lieferant` (directory with website/email/phone), `wiki` (Branchen-Lexikon), `link`, `werbung` (in-house ad inventory). Each carries its own `{post_type}-kategorie` taxonomy.

**Access model.** Gating is by WordPress login, not by a membership plugin: the `paywall` meta on an `artikel` shows non-logged-in visitors a ~700-character teaser plus a login form. Subscriber accounts are issued with the Abo. Roles in use: administrator, `goldor_administrator`, editor, author, contributor, subscriber.

**Bilingual.** WPML, German and French. Content, taxonomies and forms exist in both.

**Forms.** Ninja Forms handles the Abo order (form 3), Kontakt (form 2) and the newsletter (10 DE / 11 FR). ACF supplies the post meta.

**Advertising.** Entirely first-party via the `werbung` post type — Leaderboard 728×90, Skyscraper 160×600, Rectangle 300×250, plus Advertorial/Publireportage in print. No ad network or external ad server. Prices on request; a Mediadaten PDF is the published reference.

**Site-wide decisions already made.** Comments are disabled everywhere. The admin bar is hidden from non-editors. Google Analytics 4 (`G-4JX00LB4BM`) is loaded on every page.

**Explicitly undecided.** No accessibility standard or conformance target has been set. Advertising's weight in the site's priorities is expected to rise but has no agreed threshold.

## Brand Commitments

- **Name:** Gold'Or, set with a typographic apostrophe (Gold'Or). Wordmark SVGs ship with the theme: `img/Logo-Goldor.svg` (black), `img/Logo-Goldor-Magenta.svg`, `img/Logo-Goldor-Footer.svg`.
- **Colour:** magenta `#e6007e` is the established brand colour — it carries the wordmark, the favicon mask icon and the admin login branding.
- **Typography (pinned by the client):** Arvo for headings, Source Serif 4 for reading text, Inter for UI elements.
- **Voice:** German and French, addressing readers formally (Sie / vous), factual and close to the trade, signing as "Ihr Gold'Or-Team".
- **Independence** is part of the identity, not a marketing line — "eigenständig und unabhängig".
- **Both languages carry equal status.** Neither is a translation layer over the other.

## Evidence on Hand

**Confirmed and publishable:** nine issues a year; circulation 2,500; CHF 96 annual subscription including online access; free Probeabo with a sample copy and 30 days of online access; head office in Baar with a Neuchâtel Westschweizer Redaktion; team of Verlagsleiterin, Verlags-Assistentin and two journalists plus Fachautoren; roughly 1,290 subscriber accounts (internal figure — not currently published anywhere).

**Real content already in the system:** a substantial editorial archive across artikel, News, Personen, Kalender, Jobs, Kleinanzeigen, Lieferanten and Wiki, with genuine staff and freelance bylines; the trade-fair calendar; live advertiser creative.

**Assets:** the wordmark SVG set, favicon set, and a fallback thumbnail in the theme's `img/`. Source pages: `/ueber-uns/`, `/goldor-bestellen/`, `/werbeformate-und-preise/` (which links the Mediadaten PDF).

**Absences future work must not fabricate:** there are no published advertising prices (they are "auf Anfrage"), no readership, traffic or engagement statistics, no testimonials, case studies, awards or press quotes, and no subscription tiers beyond the CHF 96 annual Abo and the free 30-day Probeabo.

## Product Principles

1. **The subscriber's reading experience wins.** Where the paying reader and any other audience pull in different directions, the reader decides it.
2. **Open areas earn the habit; gated areas earn the subscription.** The free utility — Kalender, Jobs, Marktplatz, Lieferanten, Wiki — is what brings the trade back weekly. The paywall must read as a fair boundary around the magazine, never as a wall across the whole site.
3. **German and French are one product.** Every surface has to work as well in the Romandie as in Baar; neither language may be designed as the afterthought.
4. **Print sets the rhythm, the web fills the interval.** The site supports and sells the nine-issue magazine rather than competing with it.
5. **Advertising is house-sold furniture.** Placements stay visible and credible because the Verlag sells them directly — never intrusive, never outsourced, never buried.
