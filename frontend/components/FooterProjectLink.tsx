"use client";

import Link from "next/link";
import { usePathname } from "next/navigation";

export default function FooterProjectLink() {
  const pathname = usePathname();
  const isContactPage = pathname.replace(/\/$/, "") === "/contact";

  return (
    <Link className="button main-btn" href={isContactPage ? "#contact-project-form" : "/contact/"}>
      <span className="button-text">Discuss Your Project</span>
      <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
        <path d="M5 12h14" />
        <path d="m13 6 6 6-6 6" />
      </svg>
    </Link>
  );
}
