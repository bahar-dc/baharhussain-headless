"use client";

import Link from "next/link";
import { useState } from "react";

const navigation = [
  { label: "Home", href: "/" },
  { label: "About", href: "/about/" },
  { label: "Services", href: "/services/" },
  { label: "Projects", href: "/projects/" },
  { label: "Blog", href: "/blog/" },
];

export default function Header() {
  const [open, setOpen] = useState(false);
  const closeMenu = () => setOpen(false);

  return (
    <>
      <header className="site-header header-section">
        <div className="site-header__bar">
          <div className="site-header__inner wrapper">
            <div className="site-header__brand header-logo">
              <div className="site-header__site-title mb-0 no-heading-style">
                <Link className="site-header__logo-link" href="/" aria-label="Bahar Hussain Home">
                  <img src="/assets/build/images/site-logo.svg" alt="Bahar Hussain" width="330" height="40" />
                </Link>
              </div>
            </div>
            <div className="site-header__nav header-nav">
              <nav id="site-header-menu" className="site-header__menu" aria-label="Primary navigation">
                <ul className="site-header__menu-list">
                  {navigation.map((item) => <li key={item.href}><Link href={item.href}>{item.label}</Link></li>)}
                </ul>
              </nav>
            </div>
            <div className="site-header__actions header-btns">
              <Link className="button primary-btn site-header__cta" href="/contact/">Discuss Your Project</Link>
            </div>
            <button className={`site-header__menu-toggle menu-btn${open ? " active" : ""}`} type="button" aria-controls="header-slideout" aria-expanded={open} aria-label={open ? "Close navigation menu" : "Open navigation menu"} onClick={() => setOpen((value) => !value)}><span className="top" aria-hidden="true" /><span className="middle" aria-hidden="true" /><span className="bottom" aria-hidden="true" /></button>
          </div>
        </div>
      </header>
      <div id="header-slideout" className={`header-slideout${open ? " open" : ""}`} aria-hidden={!open}><div className="header-slideout-inner" role="dialog" aria-modal="true" aria-label="Mobile navigation">
        <div className="header-slideout-head"><Link className="site-header__logo-link" href="/" aria-label="Bahar Hussain Home" onClick={closeMenu}><img src="/assets/build/images/site-logo.svg" alt="Bahar Hussain" width="330" height="40" /></Link><button className="site-header__menu-toggle js-close-slideout active" type="button" aria-label="Close navigation menu" onClick={closeMenu}><span className="top" aria-hidden="true" /><span className="middle" aria-hidden="true" /><span className="bottom" aria-hidden="true" /></button></div>
        <nav className="site-mobile-nav header-nav" aria-label="Mobile navigation"><ul className="site-mobile-nav__list">{navigation.map((item) => <li key={item.href}><Link href={item.href} onClick={closeMenu}>{item.label}</Link></li>)}</ul></nav>
        <div className="site-header__mobile-actions"><Link className="button primary-btn" href="/contact/" onClick={closeMenu}>Discuss Your Project</Link></div>
      </div></div>
    </>
  );
}
