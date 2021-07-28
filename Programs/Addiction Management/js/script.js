const testimonialsContainer = document.querySelector(".testimonials-container");
const testimonial = document.querySelector(".testimonial");
const userImage = document.querySelector(".user-image");
const username = document.querySelector(".username");
const role = document.querySelector(".role");
const star = document.querySelector(".star");
const testimonials = [
  {
    stars: "⭐⭐⭐⭐⭐",
    name: "Miyah Myles",
    position: "United kingdom",
    photo:
      "https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=707b9c33066bf8808c934c8ab394dff6",
    text:
    "When You Discover the Beauty and the Power within You… Your Anxiety Will Fade Away…this mantra helps me alot overcoming with stress!!!"
  },
  {
    stars: "⭐⭐⭐⭐",
    name: "June Cha",
    position: "Germany",
    photo: "https://randomuser.me/api/portraits/women/44.jpg",
    text:
      "Maintaining a healthy weight is important for health. RAF Diet and Weight management program benefits alot me in my weight-loss journey..STAY FIT STAY SAFE... ",
  },
  {
    stars:"⭐⭐⭐⭐⭐",
    name: "Iida Niskanen",
    position: "France",
    photo: "https://randomuser.me/api/portraits/women/68.jpg",
    text:
    "When You Discover the Beauty and the Power within You… Your Anxiety Will Fade Away…this mantra helps me alot overcoming with stress!!!",
  },
  {stars:"⭐⭐⭐⭐",
    name: "Renee Sims",
    position: "Australia",
    photo: "https://randomuser.me/api/portraits/women/65.jpg",
    text:
      "This guy does everything he can to get the job done and done right. This is the second time I've hired him, and I'll hire him again in the future.",
  },
  {stars:"⭐⭐⭐⭐⭐",
    name: "Jonathan Nunfiez",
    position: "Canada",
    photo: "https://randomuser.me/api/portraits/men/43.jpg",
    text:
    "Addiction Management such a well designed program helping people.. Future belongs to RISE AND FIT",
  },
  {stars:"⭐⭐⭐⭐",
    name: "Sasha Ho",
    position: "Argentina",
    photo:
      "https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?h=350&auto=compress&cs=tinysrgb",
    text:
    "Maintaining a healthy weight is important for health. RAF Diet and Weight management program benefits alot me in my weight-Gain journey..STAY FIT STAY SAFE... ",
    
  },
  {stars:"⭐⭐⭐⭐⭐",
    name: "Veeti Seppanen",
    position: "Colombia",
    photo: "https://randomuser.me/api/portraits/men/97.jpg",
    text:
    "Worshop and daily webinar on health related topic helps alot me in my recovery from stress anxiety THANKS A TON Rise and Fit",
  },
];

let index = 1;

const updateTestimonial = () => {
  const { stars,name, position, photo, text } = testimonials[index];
  testimonial.innerHTML = text;
  userImage.src = photo;
  username.innerHTML = name;
  role.innerHTML = position;
  star.innerHTML = stars;
  index++;
  if (index > testimonials.length - 1) index = 0;
};

setInterval(updateTestimonial, 10000);
