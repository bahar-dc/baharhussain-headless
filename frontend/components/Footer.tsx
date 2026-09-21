import Link from "next/link";
import FooterProjectLink from "@/components/FooterProjectLink";
import { fetchGraphQL } from "@/lib/graphql";

const footerMenusQuery = `
  query FooterMenus {
    footerMenu: menus(where: { location: FOOTER_NAV }) {
      nodes {
        menuItems {
          nodes {
            id
            label
            url
            path
            parentId
            target
          }
        }
      }
    }
    legalMenu: menus(where: { location: LEGAL_NAV }) {
      nodes {
        menuItems {
          nodes {
            id
            label
            url
            path
            parentId
            target
          }
        }
      }
    }
  }
`;

type WordPressMenuItem = {
  id: string;
  label: string | null;
  url: string | null;
  path: string | null;
  parentId: string | null;
  target: string | null;
};

type FooterMenusResponse = {
  footerMenu: { nodes: Array<{ menuItems: { nodes: WordPressMenuItem[] } | null }> };
  legalMenu: { nodes: Array<{ menuItems: { nodes: WordPressMenuItem[] } | null }> };
};

type FooterLink = {
  id: string;
  label: string;
  href: string;
  external: boolean;
  target: string | null;
};

function toFooterLink(item: WordPressMenuItem, wordpressOrigin: string): FooterLink | null {
  if (!item.label || (!item.path && !item.url)) return null;

  const destination = item.path || item.url || "/";
  const parsedDestination = new URL(destination, wordpressOrigin);
  const external = parsedDestination.origin !== wordpressOrigin;
  const href = external
    ? destination
    : item.path?.startsWith("/")
      ? item.path
      : `${parsedDestination.pathname}${parsedDestination.search}${parsedDestination.hash}`;

  return { id: item.id, label: item.label, href, external, target: item.target };
}

function renderFooterMenu(items: WordPressMenuItem[], wordpressOrigin: string) {
  return items
    .filter((item) => !item.parentId)
    .map((item) => toFooterLink(item, wordpressOrigin))
    .filter((item): item is FooterLink => item !== null)
    .map((item) => (
      <li key={item.id}>
        {item.external ? (
          <a href={item.href} target={item.target || undefined} rel={item.target === "_blank" ? "noopener noreferrer" : undefined}>{item.label}</a>
        ) : (
          <Link href={item.href} target={item.target || undefined}>{item.label}</Link>
        )}
      </li>
    ));
}

export default async function Footer() {
  const { footerMenu, legalMenu } = await fetchGraphQL<FooterMenusResponse>(footerMenusQuery);
  const wordpressOrigin = new URL(process.env.WORDPRESS_GRAPHQL_URL!).origin;
  const footerItems = footerMenu.nodes[0]?.menuItems?.nodes ?? [];
  const legalItems = legalMenu.nodes[0]?.menuItems?.nodes ?? [];

  return (
    <footer id="footer-section" className="footer-section">
      <div className="footer-ctn site-footer">
        <div className="wrapper">
          <div className="site-footer__box">
            <div className="site-footer__main">
              <div className="site-footer__brand">
                <Link className="site-footer__logo" href="/" aria-label="Bahar Hussain Home">
                  <img src="/assets/build/images/site-logo.svg" alt="Bahar Hussain" width="330" height="40" />
                </Link>
                <p>Custom WordPress development built around your project needs.</p>
              </div>

              <nav className="site-footer__nav" aria-label="Quick links">
                <h2>Quick Links</h2>
                <ul className="site-footer__menu">{renderFooterMenu(footerItems, wordpressOrigin)}</ul>
              </nav>

              <div className="site-footer__contact-column">
                <h2>Contact</h2>
                <ul className="site-footer__contact">
                  <li>
                    <span aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M4 6h16v12H4z" /><path d="m4 7 8 6 8-6" /></svg></span>
                    <a href="mailto:bahar@baharhussain.com">bahar@baharhussain.com</a>
                  </li>
                  <li>
                    <span aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M12 21s7-5.2 7-11a7 7 0 0 0-14 0c0 5.8 7 11 7 11Z" /><circle cx="12" cy="10" r="2.5" /></svg></span>
                    Lahore, Pakistan
                  </li>
                  <li>
                    <span aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M6.5 10v8M6.5 6v.01M11 18v-4.5a3 3 0 0 1 6 0V18M11 10v8" /></svg></span>
                    <a href="https://www.linkedin.com/in/bahar-hussain/" target="_blank" rel="noopener noreferrer">Connect on LinkedIn</a>
                  </li>
                  <li>
                    <span aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M7.2 3.5 10 7.8 7.9 10a15.8 15.8 0 0 0 6.1 6.1l2.2-2.1 4.3 2.8-.8 3.4c-.2.8-.9 1.3-1.7 1.3A15.5 15.5 0 0 1 2.5 6c0-.8.5-1.5 1.3-1.7l3.4-.8Z" /></svg></span>
                    <a href="tel:+923474849527">+923474849527</a>
                  </li>
                </ul>
              </div>

              <div className="site-footer__cta">
                <span className="site-footer__cta-icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24" focusable="false"><path d="M21 3 10 14" /><path d="m21 3-7 20-4-9-9-4 20-7Z" /></svg>
                </span>
                <h2>Ready to Move Your Project Forward?</h2>
                <p>Share what you are planning, and I will help you find a clear and practical next step.</p>
                <FooterProjectLink />
                <a className="button outline-btn" href="https://calendly.com/baharhussain/schedule" target="_blank" rel="noopener noreferrer" aria-label="Schedule a Meeting (opens in a new tab)" title="Schedule a Meeting">
                  <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false"><rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" strokeWidth="1.7" /><path d="M7 3v4M17 3v4M3 10h18" stroke="currentColor" strokeWidth="1.7" strokeLinecap="round" /></svg>
                  <span className="button-text">Schedule a Meeting</span>
                </a>
              </div>
            </div>
            <div className="site-footer__bottom flex-between-center">
              <p>© {new Date().getUTCFullYear()} Bahar Hussain. All rights reserved.</p>
              <nav className="site-footer__legal" aria-label="Legal links">
                <ul className="site-footer__legal-menu">{renderFooterMenu(legalItems, wordpressOrigin)}</ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
}
