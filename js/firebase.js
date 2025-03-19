import { initializeApp } from 'https://www.gstatic.com/firebasejs/11.3.1/firebase-app.js';
import { getAuth, signInWithEmailAndPassword, signOut} from 'https://www.gstatic.com/firebasejs/11.3.1/firebase-auth.js';


const firebaseConfig = {
  apiKey: "AIzaSyCWHdgLZjdUk5XaCoJUGa5t-_BBtrdvBvk",
  authDomain: "v-chain.firebaseapp.com",
  projectId: "v-chain",
  storageBucket: "v-chain.firebasestorage.app",
  messagingSenderId: "841880444611",
  appId: "1:841880444611:web:f6c834230bded005dfcc76",
  measurementId: "G-W6LJP752BP"
};

// Initialize Firebase  
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

// Register User
// export function register(email, password) {
//   return createUserWithEmailAndPassword(auth, email, password)
//     .then((userCredential) => {
//       console.log("User registered:", userCredential.user);
//       return userCredential.user;
//     })
//     .catch((error) => {
//       console.error("Error registering user:", error.message);
//     });
// }

// Login User
export async function login(email, password) {
  try {
    const userCredential = await signInWithEmailAndPassword(auth, email, password);
    const user = userCredential.user;
    const idToken = await user.getIdToken();

    document.cookie = `authToken = ${idToken}; path=/; Secure; `
    return user;
  } catch (error) {
    throw error; 
  }
}

// Logout User
export function logout() {
  return signOut(auth)
    .then(() => {   
      alert("User logged out");
      window.location.href = "/v-chain/php/Admin_Login.php";
    })
    .catch((error) => {
      console.error("Error logging out:", error.message);
    });
}
export { auth };
