<?php
$message = "";
if (isset($_POST['submit_rsvp'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $kehadiran = $_POST['kehadiran'];
    $ucapan = htmlspecialchars($_POST['ucapan']);
    $data = "Nama: $nama | Kehadiran: $kehadiran | Ucapan: $ucapan" . PHP_EOL;
    file_put_contents('senarai_tetamu.txt', $data, FILE_APPEND);
    $message = "Terima kasih $nama! Kehadiran anda telah direkodkan.";
}
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Jemputan Mimi & Ismul</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@300;400;600&family=Playfair+Display:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        .font-cursive { font-family: 'Great Vibes', cursive; }
        .font-serif { font-family: 'Playfair Display', serif; }
        
        body { 
            font-family: 'Poppins', sans-serif; 
            -webkit-tap-highlight-color: transparent; 
            padding-bottom: 70px;
            /* Background Menyeluruh - Corak Flora Putih Halus */
            background-color: #ffffff;
            background-image: url("https://www.transparenttextures.com/patterns/clean-gray-paper.png");
            background-attachment: fixed;
        }
        
        /* Gambar Hero dengan Frame Bunga */
        .hero-bg {
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('images/background.jpg');
            background-size: cover;
            background-position: center;
            height: 85vh;
            border-bottom-left-radius: 50% 10%;
            border-bottom-right-radius: 50% 10%;
        }

        .mobile-container {
            max-width: 480px;
            margin: 0 auto;
            position: relative;
            background: rgba(255, 255, 255, 0.7);
        }

        /* Hiasan Daun di Penjuru */
        .leaf-corner {
            position: absolute;
            width: 150px;
            opacity: 0.6;
            z-index: 0;
            pointer-events: none;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid #e5e7eb;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        /* Navigasi Hijau Daun (Sama seperti contoh gambar anda) */
        .fixed-footer-nav {
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            max-width: 480px;
            background-color: #2d3e2d; /* Hijau Deep Forest */
            color: #ffffff;
            height: 75px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            z-index: 1000;
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: rgba(255, 255, 255, 0.6);
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .nav-item i { font-size: 18px; margin-bottom: 5px; }
        .nav-item.active { color: white; }

        /* Countdown Style */
        .timer-box {
            background: #fdfdfd;
            border: 1px solid #d1d5db;
            color: #166534; /* Emerald 800 */
        }
    </style>
</head>
<body>

    <audio id="weddingMusic" loop>
        <source src="https://www.bensound.com/bensound-music/bensound-love.mp3" type="audio/mpeg">
    </audio>

    <div class="fixed-footer-nav">
        <a href="#hubungi" class="nav-item" onclick="handleHubungiClick(); return false;">
            <i class="fas fa-phone-alt"></i>
            <span>Hubungi</span>
        </a>
        <a href="#countdown" class="nav-item">
            <i class="fas fa-calendar-check"></i>
            <span>Tarikh</span>
        </a>
        <a href="#rsvp" class="nav-item">
            <i class="fas fa-heart"></i>
            <span>RSVP</span>
        </a>
        <a href="#lokasi" class="nav-item">
            <i class="fas fa-map-marked-alt"></i>
            <span>Lokasi</span>
        </a>
    </div>

    <div class="mobile-container overflow-hidden min-h-screen border-x border-gray-100 shadow-inner">
        
        <section class="hero-bg flex flex-col justify-center items-center text-center px-6 relative">
            <div data-aos="fade-up" data-aos-duration="1500" class="z-10 bg-white/40 p-8 rounded-full backdrop-blur-[2px]">
                <h2 class="text-xs tracking-[0.5em] uppercase mb-4 text-emerald-900 font-semibold">Walimatulurus</h2>
                <h1 class="text-5xl font-cursive text-emerald-800 mb-2">Mimi Suriati</h1>
                <span class="text-2xl font-serif italic text-emerald-700">&</span>
                <h1 class="text-5xl font-cursive text-emerald-800 mt-2">Ismul Rohazimi</h1>
                <div class="h-[1px] w-24 bg-emerald-200 mx-auto my-6"></div>
                <p class="text-sm font-serif tracking-widest text-emerald-900 font-bold uppercase">11 MAC 2027</p>
                <p class="text-[10px] italic text-emerald-800 opacity-80 mt-1">2 Syawal 1448H</p>
            </div>
        </section>

        <img src="https://i.ibb.co/VvzS6mY/leaf-top-right.png" class="leaf-corner top-0 right-0" alt="flora">

        <section id="countdown" class="py-16 text-center px-4 relative">
            <div data-aos="fade-up">
                <img src="https://i.ibb.co/6rW8hYQ/flower-divider.png" class="mx-auto w-24 mb-6 opacity-30" alt="divider">
                <h2 class="text-emerald-800 uppercase tracking-widest text-[10px] mb-8 font-bold">Menghitung Hari Bahagia</h2>
                <div id="timer" class="flex justify-center gap-3">
                    <div class="timer-box p-4 rounded-2xl w-20 shadow-sm">
                        <span id="days" class="text-2xl font-bold block leading-none">00</span>
                        <span class="text-[8px] uppercase tracking-tighter opacity-60">Hari</span>
                    </div>
                    <div class="timer-box p-4 rounded-2xl w-20 shadow-sm">
                        <span id="hours" class="text-2xl font-bold block leading-none">00</span>
                        <span class="text-[8px] uppercase tracking-tighter opacity-60">Jam</span>
                    </div>
                    <div class="timer-box p-4 rounded-2xl w-20 shadow-sm">
                        <span id="minutes" class="text-2xl font-bold block leading-none">00</span>
                        <span class="text-[8px] uppercase tracking-tighter opacity-60">Minit</span>
                    </div>
                    <div class="timer-box p-4 rounded-2xl w-20 shadow-sm">
                        <span id="seconds" class="text-2xl font-bold block leading-none">00</span>
                        <span class="text-[8px] uppercase tracking-tighter opacity-60">Saat</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="lokasi" class="py-12 px-6 relative">
            <div data-aos="fade-right" class="space-y-6">
                <div class="text-center p-8 bg-white border border-emerald-50 rounded-3xl shadow-sm relative overflow-hidden">
                    <div class="absolute -top-2 -left-2 text-emerald-100 text-4xl opacity-40"><i class="fas fa-leaf rotate-45"></i></div>
                    
                    <h3 class="text-emerald-800 font-bold text-xs uppercase tracking-widest mb-4">Lokasi Majlis</h3>
                    <p class="text-sm text-stone-600 font-serif leading-relaxed">
                        Dewan Institut Latihan Lembaga Kenaf Dan Tembakau Negara, <br>
                        <span class="font-bold">Pasir Puteh, Kelantan.</span>
                    </p>
                    <a href="https://maps.google.com" target="_blank" class="mt-6 inline-block bg-emerald-800 text-white px-10 py-3 rounded-full text-[10px] font-bold shadow-lg uppercase tracking-widest active:scale-95 transition">Petunjuk Arah</a>
                </div>

                <div data-aos="fade-left" class="text-center p-8 bg-emerald-900 text-white rounded-3xl shadow-xl border-b-8 border-emerald-700">
                    <h3 class="text-emerald-200 font-bold text-xs uppercase tracking-widest mb-4 opacity-80">Waktu Kenduri</h3>
                    <p class="text-3xl font-serif italic mb-2">10.00 AM - 5.00 PM</p>
                    <div class="h-[1px] w-12 bg-white/20 mx-auto my-4"></div>
                    <p class="text-[10px] opacity-70 italic tracking-wide font-light">"Semoga kehadiran kalian membawa berkat kepada ikatan kami."</p>
                </div>
            </div>
        </section>

        <section id="rsvp" class="py-16 px-6 bg-emerald-50/30">
            <div class="glass-card p-8 rounded-[2rem] relative border border-emerald-100" data-aos="zoom-in">
                <h2 class="text-4xl font-cursive text-center text-emerald-800 mb-8">Buku Tamu</h2>
                
                <?php if($message): ?>
                    <div class="bg-emerald-800 text-white p-4 rounded-xl mb-6 text-center text-[11px] font-bold animate-bounce shadow-lg">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <form action="" method="POST" class="space-y-6">
                    <div class="relative">
                        <input type="text" name="nama" required placeholder="Nama Penuh" class="w-full p-4 bg-white border border-emerald-100 rounded-xl focus:ring-2 focus:ring-emerald-800 outline-none text-sm placeholder-emerald-900/30">
                    </div>
                    <div>
                        <select name="kehadiran" class="w-full p-4 bg-white border border-emerald-100 rounded-xl focus:ring-2 focus:ring-emerald-800 outline-none text-sm text-emerald-900/70">
                            <option value="Hadir">InsyaAllah, Saya Hadir</option>
                            <option value="Hadir (Berdua)">Kami Hadir Berdua</option>
                            <option value="Tidak Hadir">Maaf, Tidak Dapat Hadir</option>
                        </select>
                    </div>
                    <div>
                        <textarea name="ucapan" rows="3" placeholder="Titipkan Doa & Ucapan" class="w-full p-4 bg-white border border-emerald-100 rounded-xl focus:ring-2 focus:ring-emerald-800 outline-none text-sm placeholder-emerald-900/30"></textarea>
                    </div>
                    <button type="submit" name="submit_rsvp" class="w-full bg-emerald-800 text-white py-4 rounded-xl font-bold shadow-xl active:scale-95 transition-all text-[11px] uppercase tracking-widest">Hantar Kehadiran</button>
                </form>
            </div>
        </section>

        <footer id="hubungi" class="py-16 bg-white text-center px-6 relative">
            <div class="h-[1px] w-full bg-emerald-50 absolute top-0 left-0"></div>
            <h3 class="text-emerald-800 font-serif italic text-xl mb-8">Hubungi Keluarga</h3>
            <div class="grid grid-cols-2 gap-4">
                <a href="https://wa.me/60123456789" class="flex flex-col items-center p-4 bg-emerald-50 rounded-2xl border border-emerald-100 transition hover:bg-emerald-100">
                    <span class="text-[10px] font-bold text-emerald-900 uppercase">Ismul</span>
                    <span class="text-[9px] text-emerald-700 opacity-60">WhatsApp</span>
                </a>
                <a href="https://wa.me/60198765432" class="flex flex-col items-center p-4 bg-emerald-50 rounded-2xl border border-emerald-100 transition hover:bg-emerald-100">
                    <span class="text-[10px] font-bold text-emerald-900 uppercase">Mimi</span>
                    <span class="text-[9px] text-emerald-700 opacity-60">WhatsApp</span>
                </a>
            </div>
            <div class="mt-16 text-emerald-900 opacity-30">
                <p class="text-[9px] uppercase tracking-[0.5em] mb-2">Mimi & Ismul</p>
                <p class="text-[8px] italic">#MimiIsmulWedding2027</p>
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 1000, once: true });

        const weddingDate = new Date("Mar 11, 2027 10:00:00").getTime();
        setInterval(function() {
            const now = new Date().getTime();
            const diff = weddingDate - now;
            if (diff > 0) {
                document.getElementById("days").innerText = Math.floor(diff / (1000 * 60 * 60 * 24));
                document.getElementById("hours").innerText = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                document.getElementById("minutes").innerText = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                document.getElementById("seconds").innerText = Math.floor((diff % (1000 * 60)) / 1000);
            }
        }, 1000);

        const music = document.getElementById("weddingMusic");
        document.querySelector('.fixed-footer-nav').addEventListener('click', function() {
            if (music.paused) music.play();
        }, { once: true });

        function handleHubungiClick() {
            document.getElementById('hubungi').scrollIntoView({ behavior: 'smooth' });
        }
    </script>
</body>
</html>