import styles from "@/assets/src/blocks/home-hero/home-hero.module.scss";

type HomeHeroProps = {
  eyebrow?: string | null;
  title?: string | null;
  description?: string | null;
  imageUrl?: string | null;
  imageAlt?: string | null;
  primaryLabel?: string | null;
  primaryUrl?: string | null;
  secondaryLabel?: string | null;
  secondaryUrl?: string | null;
};

export default function HomeHero({
  eyebrow,
  title,
  description,
  imageUrl,
  imageAlt = "",
  primaryLabel,
  primaryUrl,
  secondaryLabel,
  secondaryUrl,
}: HomeHeroProps) {
  return (
    <section className={`${styles["home-hero"] ?? "home-hero"}`}>
      <div className="home-hero__grid">
        <div className="home-hero__content">
          {eyebrow && <p className="home-hero__eyebrow">{eyebrow}</p>}
          {title && <h1 className="home-hero__title">{title}</h1>}
          {description && <p className="home-hero__text">{description}</p>}
          {(primaryLabel || secondaryLabel) && (
            <div className="home-hero__buttons">
              {primaryLabel && <a className="button main-btn" href={primaryUrl || "#"}>{primaryLabel}</a>}
              {secondaryLabel && <a className="button button-text" href={secondaryUrl || "#"}>{secondaryLabel}</a>}
            </div>
          )}
        </div>
        {imageUrl && (
          <div className="home-hero__media">
            <div className="home-hero__image">
              <img src={imageUrl} alt={imageAlt || ""} />
            </div>
          </div>
        )}
      </div>
    </section>
  );
}
