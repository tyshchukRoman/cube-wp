import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

/*
 * Stagger Items
 */
function StaggerItems(section, items) {
  [...document.querySelectorAll(section)].forEach(section => {
    if(!section) {
      return;
    }

    gsap.timeline({
      scrollTrigger: {
        trigger: section,
        start: 'top center',
        end: 'bottom center',
        toggleActions: "play none none none",
      }
    })
      .from(section.querySelectorAll(items), {
        stagger: 0.2,
        x: -20,
        duration: 1,
        autoAlpha: 0,
        ease: "power1.out",
      });
  });
}

export default StaggerItems;
