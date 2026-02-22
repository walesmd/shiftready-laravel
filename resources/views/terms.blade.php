<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Terms of Service — ShiftReady</title>
  <meta name="description" content="Read the ShiftReady Terms of Service. Understand your rights and obligations as a Business or Worker on our independent contractor marketplace." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

  <!-- ============================================================
       HEADER
  ============================================================ -->
  <header class="site-header">
    <div class="site-header-inner">

      <a href="{{ route('home') }}" class="logo-link">
        <div class="logo-mark"><span>SR</span></div>
        <span class="logo-text">ShiftReady</span>
      </a>

      <nav class="main-nav">
        <a href="{{ route('home') }}#employers">For Employers</a>
        <a href="{{ route('home') }}#workers">For Workers</a>
        <a href="{{ route('home') }}#how-it-works">How It Works</a>
        <a href="{{ route('about') }}">About</a>
      </nav>

      <div class="header-actions">
        <a href="{{ route('login') }}" class="btn btn-ghost btn-sm">Log in</a>
        <a href="{{ route('signup.worker') }}" class="btn btn-primary btn-sm">Get Started</a>
      </div>

      <button type="button" id="mobile-menu-btn" class="mobile-menu-btn" aria-label="Toggle menu">
        <span id="mobile-menu-icon">
          <!-- Menu icon -->
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
        </span>
        <span id="mobile-menu-close-icon" style="display:none;">
          <!-- X icon -->
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </span>
      </button>
    </div>

    <div id="mobile-menu" class="mobile-menu">
      <nav class="mobile-nav">
        <a href="{{ route('home') }}#employers">For Employers</a>
        <a href="{{ route('home') }}#workers">For Workers</a>
        <a href="{{ route('home') }}#how-it-works">How It Works</a>
        <a href="{{ route('about') }}">About</a>
      </nav>
      <div class="mobile-nav-actions">
        <a href="{{ route('login') }}" class="btn btn-ghost btn-sm btn-w-full">Log in</a>
        <a href="{{ route('signup.worker') }}" class="btn btn-primary btn-sm btn-w-full">Get Started</a>
      </div>
    </div>
  </header>

  <!-- ============================================================
       HERO
  ============================================================ -->
  <section class="cta-section">
    <div style="max-width:56rem;margin:0 auto;">
      <p class="section-eyebrow" style="color:rgba(255,255,255,0.7);margin-bottom:1rem;">Legal</p>
      <h1 style="font-size:clamp(2rem,5vw,3.5rem);font-weight:700;margin-bottom:1.5rem;line-height:1.15;">Terms of Service</h1>
      <p style="font-size:1.125rem;line-height:1.75;max-width:42rem;opacity:0.85;">
        Effective Date: February 21, 2026. Please read these Terms carefully before using the ShiftReady platform.
      </p>
    </div>
  </section>

  <!-- ============================================================
       TERMS CONTENT
  ============================================================ -->
  <section class="section">
    <div style="max-width:52rem;margin:0 auto;">

      <p class="text-muted" style="line-height:1.75;margin-bottom:2.5rem;">
        These Terms of Service ("Terms") govern your access to and use of the ShiftReady platform, website, and related services (collectively, the "Platform") operated by ShiftReady, LLC ("ShiftReady," "we," "us," or "our"). By creating an account or using the Platform in any way, you agree to be bound by these Terms. If you do not agree, do not use the Platform.
      </p>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 1 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 1</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">Agreement to Terms</h2>
        <p class="text-muted" style="line-height:1.75;">
          These Terms constitute a legally binding agreement between you and ShiftReady effective as of February 21, 2026. By accessing or using the Platform, you represent that you are at least 18 years of age and have the legal capacity to enter into this agreement. Your continued use of the Platform constitutes acceptance of any updated Terms. THESE TERMS INCLUDE A BINDING ARBITRATION CLAUSE AND CLASS ACTION WAIVER IN SECTION 23. BY ACCEPTING THESE TERMS, YOU ACKNOWLEDGE THAT YOU HAVE READ, UNDERSTOOD, AND AGREE TO RESOLVE DISPUTES THROUGH INDIVIDUAL BINDING ARBITRATION RATHER THAN IN COURT.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 2 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 2</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">Definitions</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          As used in these Terms, the following definitions apply:
        </p>
        <ul class="text-muted" style="line-height:1.75;padding-left:1.5rem;display:flex;flex-direction:column;gap:0.5rem;">
          <li><strong>Platform</strong> — The ShiftReady website, mobile applications, and all associated technology services.</li>
          <li><strong>Worker</strong> — An independent contractor who registers on the Platform to offer labor services and fill Shifts.</li>
          <li><strong>Business</strong> or <strong>Client</strong> — A company or individual that registers on the Platform to post Shifts and engage Workers.</li>
          <li><strong>Shift</strong> — A discrete work engagement posted by a Business and filled by a Worker, with a defined location, time, and scope of work.</li>
          <li><strong>Engagement</strong> — The contractual relationship between a Business and a Worker for a specific Shift, formed independent of ShiftReady.</li>
          <li><strong>Service Fees</strong> — Fees charged by ShiftReady to Businesses and/or Workers for access to and use of the Platform.</li>
          <li><strong>Marketplace</strong> — The technology-enabled marketplace that connects Businesses and Workers via the Platform.</li>
        </ul>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 3 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 3</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">Nature of the Platform</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          ShiftReady is a technology marketplace only. ShiftReady is NOT an employer, staffing agency, labor broker, or joint employer of any Worker or Business user. ShiftReady does not supervise, direct, or control the work performed by Workers on any Shift.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          The direct legal and contractual relationship for any Shift or Engagement exists exclusively between the Business and the Worker. ShiftReady facilitates introductions and provides payment infrastructure but is not a party to any Engagement. All decisions regarding hiring, supervision, pay rates, and work conditions are made solely between Businesses and Workers.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 4 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 4</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">Account Registration &amp; Eligibility</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          To use the Platform, you must register for an account and provide accurate, complete, and current information. You may not create more than one account per person or entity. You are solely responsible for maintaining the confidentiality of your account credentials and for all activity that occurs under your account.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          ShiftReady reserves the right to verify your identity and, for Workers, your legal authorization to work in the United States. Providing false information is grounds for immediate account termination. Workers must be legally authorized to work in the United States under applicable federal immigration law.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 5 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 5</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">For Businesses — Shift Posting</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          Businesses are solely responsible for the accuracy of all Shift postings, including job descriptions, required skills, pay rates, and work locations. All posted pay rates must comply with applicable federal, state, and local minimum wage laws. Businesses are solely responsible for compliance with all Occupational Safety and Health Administration (OSHA) requirements and for maintaining safe worksites.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          Businesses may not direct, supervise, or control Workers in a manner that is inconsistent with the Workers' status as independent contractors. See Section 7 for Business obligations regarding Worker classification.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 6 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 6</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">For Businesses — Payment &amp; Cancellation</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          Businesses authorize ShiftReady to charge applicable Service Fees at the time a Shift is confirmed. Businesses must maintain a valid payment method on file. Cancellation fees apply as follows: cancellations within 24 hours of Shift start time are subject to the full Service Fee; cancellations between 24 and 72 hours prior to Shift start time are subject to a 50% Service Fee.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          Payment disputes must be submitted to ShiftReady within 5 business days of the Shift completion date. ShiftReady's determination regarding payment disputes is final. By registering, Businesses authorize ShiftReady to automatically charge the payment method on file for all fees incurred.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 7 — CRITICAL DISCLAIMER -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 7</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">For Businesses — Worker Classification Responsibility</h2>

        <div style="background-color:var(--accent-a10);border-left:4px solid var(--accent);padding:1.25rem 1.5rem;border-radius:0.5rem;margin-bottom:1.25rem;">
          <p style="font-weight:600;margin-bottom:0.5rem;color:var(--accent);">Important Notice</p>
          <p class="text-muted" style="line-height:1.75;font-size:0.9375rem;">
            By posting a Shift and engaging a Worker through the Platform, each Business explicitly acknowledges and agrees that all Workers engaged through ShiftReady are independent contractors, not employees of the Business or ShiftReady.
          </p>
        </div>

        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          Each Business is solely responsible for compliance with all applicable federal and state worker classification laws, including but not limited to the IRS common law test, the Department of Labor's economic reality test, and the ABC test as applied in California, Massachusetts, New Jersey, Connecticut, Illinois, and any other jurisdiction where similar standards apply. Businesses operating in ABC-test jurisdictions are solely responsible for independently evaluating whether their use of Workers satisfies applicable legal requirements.
        </p>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          Each Business agrees to indemnify, defend, and hold harmless ShiftReady and its officers, directors, employees, and agents from and against any and all claims, losses, penalties, fines, assessments, damages, and costs (including reasonable attorneys' fees) arising from or related to: (a) any misclassification of a Worker as an independent contractor; (b) any determination by a government agency or court that a Worker is an employee of the Business or a joint employee of the Business and ShiftReady; or (c) any failure by the Business to comply with applicable wage, hour, benefits, or tax withholding obligations.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          Businesses are strictly prohibited from treating Workers in a manner inconsistent with independent contractor status, including but not limited to: mandating specific work hours beyond what is necessary for the Shift scope, prohibiting Workers from working for competitors, providing employee-type benefits, or exercising the degree of control over the manner and means of work performance that would indicate an employment relationship.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 8 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 8</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">For Businesses — Prohibited Conduct</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          Businesses may not post Shift listings that discriminate on the basis of race, color, religion, sex, national origin, age, disability, or any other characteristic protected under applicable federal or state law. Businesses may not use the Platform to directly solicit or engage any Worker outside of the Platform for a period of 24 months following any Engagement, as doing so circumvents the Marketplace and violates these Terms.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          Businesses may not knowingly provide an unsafe worksite to Workers. Businesses may not collect or retain Worker personally identifiable information beyond what is strictly necessary for the conduct of a specific Engagement, and may not use such information for any purpose other than the Engagement for which it was provided.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 9 — CRITICAL DISCLAIMER -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 9</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">For Workers — Independent Contractor Status</h2>

        <div style="background-color:var(--accent-a10);border-left:4px solid var(--accent);padding:1.25rem 1.5rem;border-radius:0.5rem;margin-bottom:1.25rem;">
          <p style="font-weight:600;margin-bottom:0.5rem;color:var(--accent);">Important Notice Regarding Your Legal Status</p>
          <p class="text-muted" style="line-height:1.75;font-size:0.9375rem;">
            <strong>The label "independent contractor" in this Agreement does not itself determine your legal status. Classification is a fact-specific legal determination under applicable state and federal law.</strong> If you have questions about your classification, we strongly encourage you to consult with a qualified employment attorney.
          </p>
        </div>

        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          Workers who use the ShiftReady Platform do so as independent contractors. Workers are not employees of ShiftReady or of any Business that engages them through the Platform. Accordingly, Workers are not entitled to and will not receive any employee benefits from ShiftReady or from any Business, including but not limited to: health insurance, dental or vision coverage, workers' compensation insurance, unemployment insurance, paid time off, retirement or pension benefits, or any other employee benefit.
        </p>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          Workers retain the right to perform services for multiple clients, including direct competitors of ShiftReady and of any Business that engages them. ShiftReady does not guarantee any minimum amount of work, Shifts, or income to any Worker. The availability of Shifts depends on market conditions and Business demand, which ShiftReady does not control.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          Nothing in these Terms, nor the use of the terms "Worker," "independent contractor," or similar labels, creates or is intended to create an employment relationship, agency relationship, partnership, or joint venture between ShiftReady and any Worker.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 10 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 10</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">For Workers — Tax Obligations</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          Workers are solely responsible for all federal, state, and local income taxes on earnings received through the Platform. ShiftReady does not withhold any taxes from payments made to Workers. Workers who earn $600 or more in a calendar year through the Platform will receive IRS Form 1099-NEC. Workers are responsible for reporting all earnings to the IRS regardless of whether a 1099-NEC is issued.
        </p>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          As independent contractors, Workers are subject to self-employment tax (currently 15.3% on net self-employment earnings) covering Social Security and Medicare. Workers are generally required to make quarterly estimated tax payments to the IRS using Form 1040-ES to avoid underpayment penalties. ShiftReady strongly encourages Workers to set aside a portion of each payment for tax obligations.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          Workers operating through a business entity (e.g., LLC or sole proprietorship) must provide a valid IRS Form W-9 before receiving payment. ShiftReady is not responsible for any tax penalties, interest, or assessments incurred by Workers arising from their failure to comply with applicable tax law.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 11 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 11</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">For Workers — Eligibility &amp; Verification</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          Workers must be at least 18 years of age and legally authorized to work in the United States. Workers must provide accurate identity documentation as requested during onboarding. By registering, Workers consent to identity verification, background checks conducted in compliance with the Fair Credit Reporting Act (FCRA), and drug screening where required by applicable law or Business requirements. The FCRA disclosure and authorization required for background checks is provided as a separate standalone document as required by law.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          Workers seeking to fill Shifts requiring specific licenses, certifications, or professional credentials must provide accurate documentation of those credentials. ShiftReady reserves the right to verify all credentials and to deny or revoke access to Shifts where credentials cannot be verified.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 12 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 12</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">For Workers — Shift Obligations</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          Workers who accept a Shift are expected to arrive on time, prepared, and ready to work. A no-show policy applies: Workers who fail to appear for an accepted Shift without providing at least 4 hours of advance notice may be subject to account suspension or removal from the Platform. Workers must comply with the Business's reasonable workplace rules and standards of professional conduct applicable to all individuals on the worksite.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          Workers must not report to any Shift under the influence of alcohol or controlled substances. Workers must not represent themselves as an employee of the Business or of ShiftReady to any third party. All conduct at a Business's worksite is the sole responsibility of the Worker.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 13 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 13</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">For Workers — Payment</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          Workers will be paid for completed Shifts in accordance with the payment timeline published in the Platform's help documentation, which ShiftReady may update from time to time. To receive payment, Workers must link a valid bank account or other accepted payment method through the Platform's payment processor. Workers who no-show without advance notice will not be paid for that Shift.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          Payment disputes must be submitted through the Platform within 5 business days of Shift completion. ShiftReady reserves the right to adjust or withhold payments where there is reasonable evidence of fraud, misrepresentation, or violation of these Terms.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 14 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 14</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">Worker Classification — Legal Framework</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          Worker classification in the United States is determined by a number of different legal tests depending on the applicable jurisdiction and legal context. The principal tests include:
        </p>
        <ul class="text-muted" style="line-height:1.75;padding-left:1.5rem;margin-bottom:1rem;display:flex;flex-direction:column;gap:0.5rem;">
          <li><strong>IRS Common Law Test</strong> — Evaluates three categories: behavioral control (does the company control how work is performed?), financial control (does the company control business aspects of the worker's job?), and type of relationship (are there written contracts, employee benefits, permanency of the relationship?).</li>
          <li><strong>DOL Economic Reality Test</strong> — Evaluates whether a worker is economically dependent on the hiring entity or, as a matter of economic reality, is in business for themselves.</li>
          <li><strong>ABC Test</strong> — Used in California (AB5), Massachusetts, New Jersey, Connecticut, Illinois, and other states. Presumes worker status as employee unless the hiring entity can satisfy all three prongs: (A) freedom from control; (B) work performed outside the usual course of the hiring entity's business; and (C) customarily engaged in an independently established trade.</li>
        </ul>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          California AB5 applies a strict ABC test. Businesses engaging Workers in California should consult with qualified legal counsel before doing so. These Terms are governed by Texas law (see Section 24), but Workers and Businesses operating in other jurisdictions may be subject to different or additional legal requirements.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          ShiftReady strongly recommends that both Workers and Businesses consult with qualified legal counsel regarding their classification rights and obligations under applicable law.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 15 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 15</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">Insurance</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          Businesses are required to maintain adequate commercial general liability insurance covering their operations and worksite. Where required by applicable state law, Businesses must also maintain workers' compensation insurance covering their employees. Businesses are solely responsible for determining what insurance coverage applies to their use of the Platform.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          Workers are not covered by any workers' compensation insurance provided by ShiftReady. Workers are strongly encouraged to obtain occupational accident insurance or other coverage appropriate to their activities as independent contractors. ShiftReady is not responsible for any injuries, illnesses, or damages suffered by Workers in the course of performing Shifts.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 16 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 16</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">Intellectual Property</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          ShiftReady owns all right, title, and interest in and to the Platform, including all software, designs, trademarks, service marks, logos, text, and other content created by ShiftReady (collectively, "ShiftReady IP"). Nothing in these Terms transfers any ownership of ShiftReady IP to you.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          Subject to your compliance with these Terms, ShiftReady grants you a limited, non-exclusive, non-transferable, revocable license to access and use the Platform solely for its intended purpose. You may not copy, scrape, reverse engineer, decompile, modify, or create derivative works based on any portion of the Platform or ShiftReady IP without prior written consent.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 17 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 17</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">Confidentiality</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          Workers may, in the course of a Shift, receive or have access to confidential or proprietary information belonging to a Business. Workers agree to hold all such information in strict confidence, use it only in connection with the applicable Shift, and not disclose it to any third party without the Business's prior written consent.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          Businesses must protect Worker personal information in accordance with all applicable data privacy laws. Businesses may not share, sell, or otherwise disclose Worker personal information to third parties except as strictly necessary for Shift operations.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 18 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 18</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">Privacy</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          Your use of the Platform is also governed by ShiftReady's Privacy Policy, which is incorporated into these Terms by reference. The Privacy Policy explains how we collect, use, and share your personal information.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          California residents may have additional rights under the California Consumer Privacy Act (CCPA), including the right to know what personal information we collect, the right to delete personal information, and the right to opt out of the sale of personal information. To exercise any CCPA rights, please contact us using the information in Section 27.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 19 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 19</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">Prohibited Conduct (All Users)</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">All Platform users are prohibited from:</p>
        <ul class="text-muted" style="line-height:1.75;padding-left:1.5rem;display:flex;flex-direction:column;gap:0.5rem;">
          <li>Engaging in fraud, misrepresentation, or deceptive practices of any kind.</li>
          <li>Harassing, threatening, or discriminating against any other Platform user.</li>
          <li>Circumventing the Marketplace by arranging Engagements outside of the Platform with users met through the Platform (see also Sections 7 and 8).</li>
          <li>Using the Platform for any illegal purpose or in violation of any applicable law or regulation.</li>
          <li>Posting false, misleading, or inaccurate content on the Platform.</li>
          <li>Attempting to gain unauthorized access to any portion of the Platform or any other user's account.</li>
          <li>Manipulating ratings, reviews, or feedback systems on the Platform.</li>
        </ul>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 20 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 20</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">Disclaimers</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          THE PLATFORM IS PROVIDED "AS IS" AND "AS AVAILABLE" WITHOUT WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NON-INFRINGEMENT. SHIFTREADY DOES NOT WARRANT THAT THE PLATFORM WILL BE UNINTERRUPTED, ERROR-FREE, OR FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          SHIFTREADY MAKES NO WARRANTY REGARDING THE SKILL, QUALIFICATIONS, OR SUITABILITY OF ANY WORKER, NOR REGARDING THE LEGITIMACY, SAFETY OF WORKSITE, OR ACCURACY OF SHIFT POSTINGS OF ANY BUSINESS. SHIFTREADY DOES NOT SCREEN OR VERIFY ALL INFORMATION PROVIDED BY USERS AND ACCEPTS NO RESPONSIBILITY FOR THE ACCURACY OF USER-SUBMITTED CONTENT.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 21 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 21</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">Limitation of Liability</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          TO THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW, SHIFTREADY'S TOTAL LIABILITY TO YOU FOR ANY CLAIMS ARISING OUT OF OR RELATED TO THESE TERMS OR YOUR USE OF THE PLATFORM SHALL NOT EXCEED THE TOTAL AMOUNT OF SERVICE FEES PAID TO OR RECEIVED FROM SHIFTREADY BY YOU IN THE SIX (6) MONTHS PRECEDING THE EVENT GIVING RISE TO THE CLAIM.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          IN NO EVENT SHALL SHIFTREADY BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, PUNITIVE, OR CONSEQUENTIAL DAMAGES, INCLUDING LOST PROFITS, LOST DATA, BUSINESS INTERRUPTION, OR PERSONAL INJURY, EVEN IF SHIFTREADY HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. SHIFTREADY IS NOT LIABLE FOR ANY CONDUCT, ACTIONS, OR OMISSIONS OF ANY WORKER AT A BUSINESS'S WORKSITE, OR FOR THE CONDUCT OF ANY BUSINESS TOWARD ANY WORKER.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 22 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 22</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">Indemnification</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          <strong>Businesses</strong> agree to indemnify, defend, and hold harmless ShiftReady and its officers, directors, employees, successors, and assigns from and against all claims, damages, losses, liabilities, costs, and expenses (including reasonable attorneys' fees) arising from or related to: (a) any Engagement or Shift, including any workplace injury to a Worker; (b) any misclassification of a Worker or joint-employer determination; (c) the Business's breach of these Terms; or (d) the Business's violation of any applicable law.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          <strong>Workers</strong> agree to indemnify, defend, and hold harmless ShiftReady and its officers, directors, employees, successors, and assigns from and against all claims, damages, losses, liabilities, costs, and expenses (including reasonable attorneys' fees) arising from or related to: (a) the Worker's conduct while performing any Shift; (b) the Worker's breach of these Terms; or (c) the Worker's violation of any applicable law, including tax obligations.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 23 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 23</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">Dispute Resolution</h2>

        <div style="background-color:var(--accent-a10);border-left:4px solid var(--accent);padding:1.25rem 1.5rem;border-radius:0.5rem;margin-bottom:1.25rem;">
          <p style="font-weight:600;margin-bottom:0.5rem;color:var(--accent);">Binding Arbitration &amp; Class Action Waiver</p>
          <p class="text-muted" style="line-height:1.75;font-size:0.9375rem;">
            Any dispute arising out of or relating to these Terms or your use of the Platform shall be resolved through binding individual arbitration. You waive your right to participate in a class action lawsuit or class-wide arbitration.
          </p>
        </div>

        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          Before initiating arbitration, the party seeking relief must provide the other party with 30 days' written notice of the dispute and engage in good-faith negotiation to resolve it. If the dispute is not resolved within 30 days, either party may initiate arbitration administered by the American Arbitration Association (AAA) under its Consumer Arbitration Rules, as modified by these Terms. Arbitration shall be conducted on an individual basis; class, consolidated, or representative proceedings are not permitted.
        </p>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          ShiftReady will pay all AAA filing fees and arbitrator compensation for any arbitration you initiate in good faith. The arbitrator may award the same remedies as a court, including injunctive or declaratory relief on an individual basis.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          Notwithstanding the foregoing, either party may bring an individual claim in small claims court if the claim qualifies. This arbitration agreement does not prevent either party from seeking emergency injunctive relief from a court of competent jurisdiction to preserve the status quo pending arbitration.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 24 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 24</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">Governing Law &amp; Venue</h2>
        <p class="text-muted" style="line-height:1.75;">
          These Terms and any dispute arising out of or relating to them or to your use of the Platform shall be governed by and construed in accordance with the laws of the State of Texas, without regard to its conflict of law provisions. For any claims or disputes not subject to the arbitration agreement in Section 23, you consent to the exclusive jurisdiction and venue of the state and federal courts located in Bexar County, Texas.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 25 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 25</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">Modifications</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          ShiftReady may update or modify these Terms at any time. We will notify you of material changes by email or by posting a notice on the Platform. Your continued use of the Platform after the effective date of any updated Terms constitutes your acceptance of the changes.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          For material changes that significantly affect your rights or obligations, ShiftReady may require your affirmative re-acceptance of the updated Terms before you may continue using the Platform.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 26 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 26</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">Termination</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          ShiftReady may suspend or terminate your access to the Platform at any time, with or without cause, and with or without notice. Accounts found to have engaged in fraud, safety violations, or serious breaches of these Terms may be terminated immediately and without prior notice.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          Upon termination, your right to use the Platform ceases immediately. The following provisions survive termination: payment obligations, confidentiality (Section 17), indemnification (Section 22), dispute resolution (Section 23), limitation of liability (Section 21), and any other provisions that by their nature should survive.
        </p>
      </div>

      <!-- ────────────────────────────────────────────────────── -->
      <!-- SECTION 27 -->
      <!-- ────────────────────────────────────────────────────── -->
      <div style="margin-bottom:2.5rem;">
        <p class="section-eyebrow">Section 27</p>
        <h2 style="font-size:1.375rem;font-weight:700;margin-bottom:1rem;">General Provisions</h2>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          These Terms, together with the Privacy Policy and any other policies incorporated by reference, constitute the entire agreement between you and ShiftReady regarding your use of the Platform and supersede all prior agreements and understandings. If any provision of these Terms is found to be invalid or unenforceable, the remaining provisions will remain in full force and effect.
        </p>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          ShiftReady's failure to enforce any right or provision of these Terms does not constitute a waiver of that right or provision. You may not assign your rights or obligations under these Terms without ShiftReady's prior written consent. ShiftReady may assign its rights and obligations freely. Neither party will be liable for delays or failures in performance resulting from circumstances beyond its reasonable control (force majeure).
        </p>
        <p class="text-muted" style="line-height:1.75;margin-bottom:1rem;">
          Nothing in these Terms creates a joint venture, partnership, employment relationship, or agency relationship between ShiftReady and any user.
        </p>
        <p class="text-muted" style="line-height:1.75;">
          To contact ShiftReady regarding these Terms or to submit a notice required under these Terms, please email us at <strong>legal@shiftready.com</strong> or write to: ShiftReady, LLC, San Antonio, Texas.
        </p>
      </div>

    </div>
  </section>

  <!-- ============================================================
       CTA
  ============================================================ -->
  <section class="cta-section">
    <div style="max-width:56rem;margin:0 auto;">
      <h2>Ready to get started?</h2>
      <p>Whether you need workers for tomorrow or you're looking for flexible work on your terms, getting started takes less than 5 minutes.</p>
      <div class="cta-actions">
        <a href="{{ route('signup.employer') }}" class="btn btn-inverted btn-lg">
          I Need Workers
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
        </a>
        <a href="{{ route('signup.worker') }}" class="btn btn-outline-inverted btn-lg">I Want to Work</a>
      </div>
    </div>
  </section>

  <x-site-footer />

</body>
</html>
