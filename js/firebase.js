// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import {getAuth, getAuth, signInWithEmailAndPassword, createUserWithEmailAndPassword, signOut} from "firebase/auth";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
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
const analytics = getAnalytics(app);
const auth = getAuth(app);

export { auth };
