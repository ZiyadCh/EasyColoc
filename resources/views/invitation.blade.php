<div style="background: linear-gradient(to bottom right, #111827, #000000); padding: 40px 20px; font-family: sans-serif; min-height: 100%; color: #d1d5db; text-align: center;">
    <div style="max-width: 500px; margin: 0 auto; background-color: #1f2937; border: 1px solid #374151; border-radius: 24px; padding: 40px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.5);">

        <h2 style="color: #6366f1; font-size: 14px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 24px;">
            EasyColoc
        </h2>

        <p style="font-size: 16px; line-height: 1.6; color: #9ca3af; margin-bottom: 32px;">
            Tu as été invité à rejoindre la colocation : <br>
            <span style="color: #ffffff; font-weight: 700; font-size: 18px;">{{ $colocation }}</span>
        </p>

        <div style="margin-bottom: 16px;">
            <a href="{{ route('accept', ['email'=>$email]) }}" style="display: block; background-color: #059669; color: #ffffff; font-weight: 700; padding: 16px 32px; border-radius: 16px; text-decoration: none; box-shadow: 0 10px 15px -3px rgba(5, 150, 105, 0.3);">
                Accepter l'invitation
            </a>
        </div>

        <div style="margin-bottom: 32px;">
            <a href="{{ url('/dashboard') }}" style="display: block; background-color: #e11d48; color: #ffffff; font-weight: 700; padding: 16px 32px; border-radius: 16px; text-decoration: none; box-shadow: 0 10px 15px -3px rgba(225, 29, 72, 0.3);">
                Ignorer
            </a>
        </div>

    </div>
</div>
