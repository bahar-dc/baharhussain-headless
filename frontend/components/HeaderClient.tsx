"use client";

import Link from "next/link";
import { usePathname } from "next/navigation";
import { useEffect, useState } from "react";

export type HeaderMenuItem = {
  id: string;
  label: string;
  href: string;
  external: boolean;
};

function normalizePath(path: string) {
  return path.endsWith("/") ? path : `${path}/`;
}

export default function HeaderClient({ navigation }: { navigation: HeaderMenuItem[] }) {
  const pathname = usePathname();
  const [open, setOpen] = useState(false);
  const isHome = pathname === "/";
  const isContact = normalizePath(pathname) === "/contact/";

  useEffect(() => {
    const header = document.querySelector<HTMLElement>(".site-header");
    const footer = document.getElementById("footer-section");
    let lastScrollTop = window.scrollY || document.documentElement.scrollTop;
    let footerIsVisible = false;
    let ticking = false;

    function updateHeader() {
      const scrollTop = Math.max(window.scrollY || document.documentElement.scrollTop, 0);
      document.querySelectorAll("header, body").forEach((element) => {
        element.classList.toggle("shrink", scrollTop > 0);
      });

      if (header) {
        const headerHeight = header.offsetHeight;
        const scrollDifference = scrollTop - lastScrollTop;
        const menuIsOpen = document.body.classList.contains("no-overflow");

        if (scrollTop <= headerHeight || menuIsOpen) {
          header.classList.remove("site-header--hidden");
          lastScrollTop = scrollTop;
        } else if (footerIsVisible) {
          header.classList.add("site-header--hidden");
          lastScrollTop = scrollTop;
        } else if (scrollDifference <= -8) {
          header.classList.remove("site-header--hidden");
          lastScrollTop = scrollTop;
        } else if (scrollDifference >= 8) {
          header.classList.add("site-header--hidden");
          lastScrollTop = scrollTop;
        }
      }

      ticking = false;
    }

    function onScroll() {
      if (!ticking) {
        window.requestAnimationFrame(updateHeader);
        ticking = true;
      }
    }

    function onFocusIn() {
      if (header && !footerIsVisible) {
        header.classList.remove("site-header--hidden");
      }
    }

    window.addEventListener("scroll", onScroll, { passive: true });
    header?.addEventListener("focusin", onFocusIn);

    const observer = footer && "IntersectionObserver" in window
      ? new IntersectionObserver((entries) => {
          footerIsVisible = entries[0].isIntersecting;
          updateHeader();
        }, { threshold: 0 })
      : null;

    if (footer && observer) observer.observe(footer);
    updateHeader();

    return () => {
      window.removeEventListener("scroll", onScroll);
      header?.removeEventListener("focusin", onFocusIn);
      observer?.disconnect();
      header?.classList.remove("site-header--hidden", "shrink");
      document.body.classList.remove("shrink");
    };
  }, []);

  useEffect(() => {
    document.documentElement.classList.toggle("no-overflow", open);
    document.body.classList.toggle("no-overflow", open);

    return () => {
      document.documentElement.classList.remove("no-overflow");
      document.body.classList.remove("no-overflow");
    };
  }, [open]);

  useEffect(() => {
    function closeMenu() {
      setOpen(false);
    }

    window.addEventListener("popstate", closeMenu);
    return () => window.removeEventListener("popstate", closeMenu);
  }, []);

  useEffect(() => {
    if (!open) return;

    function onKeyDown(event: KeyboardEvent) {
      if (event.key === "Escape") setOpen(false);
    }

    document.addEventListener("keydown", onKeyDown);
    return () => document.removeEventListener("keydown", onKeyDown);
  }, [open]);

  const logo = (
    <Link className="site-header__logo-link" href="/" aria-label="Bahar Hussain Home" onClick={() => setOpen(false)}>
      <img src="/assets/build/images/site-logo.svg" alt="Bahar Hussain" width="330" height="40" />
    </Link>
  );

  const renderNavItems = () => navigation.map((item) => {
    const current = !item.external && normalizePath(pathname) === normalizePath(item.href);

    return (
      <li key={item.id} className={current ? "current-menu-item" : undefined}>
        {item.external ? (
          <a href={item.href} onClick={() => setOpen(false)}>{item.label}</a>
        ) : (
          <Link href={item.href} aria-current={current ? "page" : undefined} onClick={() => setOpen(false)}>
            {item.label}
          </Link>
        )}
      </li>
    );
  });

  return (
    <>
      <a className="skip-link screen-reader-text" href="#main-section">Skip to content</a>
      <header className="site-header header-section">
        <div className="site-header__bar">
          <div className="site-header__inner wrapper">
            <div className="site-header__brand header-logo">
              {isHome ? <div className="site-header__site-title mb-0 no-heading-style">{logo}</div> : logo}
            </div>
            <div className="site-header__nav header-nav">
              <nav id="site-header-menu" className="site-header__menu" aria-label="Primary navigation">
                <ul className="site-header__menu-list">{renderNavItems()}</ul>
              </nav>
            </div>
            <div className="site-header__actions header-btns">
              {isContact ? (
                <a className="button primary-btn site-header__cta" href="https://calendly.com/baharhussain/schedule" target="_blank" rel="noopener noreferrer" aria-label="Schedule Discovery Call (opens in a new tab)" title="Schedule Discovery Call">
                  <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false"><rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" strokeWidth="1.7" /><path d="M7 3v4M17 3v4M3 10h18" stroke="currentColor" strokeWidth="1.7" strokeLinecap="round" /></svg>
                  <span className="button-text">Schedule Discovery Call</span>
                </a>
              ) : (
                <Link className="button primary-btn site-header__cta" href="/contact/">Discuss Your Project</Link>
              )}
            </div>
            <button className={`site-header__menu-toggle menu-btn${open ? " active" : ""}`} type="button" aria-controls="header-slideout" aria-expanded={open} aria-label={open ? "Close navigation menu" : "Open navigation menu"} onClick={() => setOpen((value) => !value)}>
              <span className="top" aria-hidden="true" />
              <span className="middle" aria-hidden="true" />
              <span className="bottom" aria-hidden="true" />
            </button>
          </div>
        </div>
      </header>
      <div id="header-slideout" className={`header-slideout${open ? " open" : ""}`} aria-hidden={!open} onClick={(event) => {
        if (event.target === event.currentTarget) setOpen(false);
      }}>
        <div className="header-slideout-inner" role="dialog" aria-modal="true" aria-label="Mobile navigation">
          <div className="header-slideout-head">
            {logo}
            <button className="site-header__menu-toggle js-close-slideout active" type="button" aria-label="Close navigation menu" onClick={() => setOpen(false)}>
              <span className="top" aria-hidden="true" />
              <span className="middle" aria-hidden="true" />
              <span className="bottom" aria-hidden="true" />
            </button>
          </div>
          <nav className="site-mobile-nav header-nav" aria-label="Mobile navigation">
            <ul className="site-mobile-nav__list">{renderNavItems()}</ul>
          </nav>
          <div className="site-header__mobile-actions">
            <Link className="button primary-btn" href="/contact/" onClick={() => setOpen(false)}>Discuss Your Project</Link>
          </div>
        </div>
      </div>
    </>
  );
}
