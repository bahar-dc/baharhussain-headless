import type { Metadata } from "next";
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import "./globals.scss";

export const metadata: Metadata = {
  title: "Bahar Hussain",
  description: "Bahar Hussain portfolio",
};

export default function RootLayout({ children }: Readonly<{ children: React.ReactNode }>) {
  return (
    <html lang="en">
      <body suppressHydrationWarning>
        <Header />
        <main id="main-section" className="main-section">{children}</main>
        <Footer />
      </body>
    </html>
  );
}
