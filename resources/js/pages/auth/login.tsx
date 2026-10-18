
import { Form, Head } from '@inertiajs/react';
import { useEffect } from 'react';
import '@/css/login.css';

import InputError from '@/components/input-error';
import PasswordInput from '@/components/password-input';
import TextLink from '@/components/text-link';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';

import { register } from '@/routes';
import { store } from '@/routes/login';
import { request } from '@/routes/password';



type Props = {
    status?: string;
    canResetPassword: boolean;
};

export default function Login({ status, canResetPassword }: Props) {
    useEffect(() => {
    const handleGoogleMessage = (event: MessageEvent) => {
        // Only accept messages from this application.
        if (event.origin !== window.location.origin) return;

        if (event.data?.type === 'google-login-success') {
            window.location.href = '/dashboard';
        }

        if (event.data?.type === 'google-login-error') {
            alert(event.data.message);
        }
    };

    window.addEventListener('message', handleGoogleMessage);

    return () => {
        window.removeEventListener('message', handleGoogleMessage);
    };
}, []);
    return (
        <div className="login-page">
            <Head title="Log in" />

            <main className="login-container">
                <header className="login-heading">
                    <div className="login-logo" aria-hidden="true">
                        C
                    </div>
                    <h1>CPDO Venue Reservation</h1>
                    <p>Your campus venue reservation portal</p>
                </header>

                <section className="login-card">
                    <h2 className="login-card-title">Welcome back</h2>
                    <p className="login-card-description">
                        Sign in to manage your venue reservations.
                    </p>

                    {status && (
                        <div className="login-status" role="status">
                            {status}
                        </div>
                    )}

                    <Form
                        {...store.form()}
                        resetOnSuccess={['password']}
                        className="login-form"
                    >
                        {({ processing, errors }) => (
                            <>
                            <pre>
                                {JSON.stringify(errors, null, 2)}
                            </pre>
                                <div className="login-field">
                                    <Label htmlFor="email">
                                        Email address
                                    </Label>
                                    <Input
                                        id="email"
                                        type="email"
                                        name="email"
                                        required
                                        autoFocus
                                        autoComplete="email"
                                        placeholder="email@example.com"
                                    />
                                    <InputError message={errors.email} />
                                </div>

                                <div className="login-field">
                                    <div className="login-password-heading">
                                        <Label htmlFor="password">
                                            Password
                                        </Label>

                                        {canResetPassword && (
                                            <TextLink href={request()}>
                                                Forgot password?
                                            </TextLink>
                                        )}
                                    </div>

                                    <PasswordInput
                                        id="password"
                                        name="password"
                                        required
                                        autoComplete="current-password"
                                        placeholder="Enter your password"
                                    />
                                    <InputError message={errors.password} />
                                </div>

                                <div className="login-remember">
                                    <Checkbox
                                        id="remember"
                                        name="remember"
                                    />
                                    <Label htmlFor="remember">
                                        Remember me
                                    </Label>
                                </div>

                                <Button
                                    type="submit"
                                    className="login-submit"
                                    disabled={processing}
                                    data-test="login-button"
                                >
                                    {processing && <Spinner />}
                                    Log in
                                </Button>
                            </>
                        )}
                    </Form>

                    <div className="login-divider">
                        <span>OR CONTINUE WITH</span>
                    </div>

                    <button
                        type="button"
                        className="login-google"
                        onClick={() => {
                            const width = 500;
                            const height = 650;
                        
                            const left = window.screenX + (window.outerWidth - width) / 2;
                            const top = window.screenY + (window.outerHeight - height) / 2;
                        
                            window.open(
                                '/auth/google',
                                'googleSignIn',
                                `width=${width},height=${height},left=${left},top=${top},resizable=yes,scrollbars=yes`,
                            );
                        }}
                    >
                        <svg
                            className="login-google-icon"
                            viewBox="0 0 48 48"
                            aria-hidden="true"
                        >
                            <path
                                fill="#4285F4"
                                d="M43.6 24.5c0-1.4-.1-2.8-.4-4.1H24v7.8h11a9.4 9.4 0 0 1-4.1 6.2v5.1h6.6c3.9-3.6 6.1-8.8 6.1-15z"
                            />
                            <path
                                fill="#34A853"
                                d="M24 44c5.5 0 10.1-1.8 13.5-4.9l-6.6-5.1c-1.8 1.2-4.1 2-6.9 2-5.3 0-9.8-3.6-11.4-8.4H5.8v5.3A20 20 0 0 0 24 44z"
                            />
                            <path
                                fill="#FBBC05"
                                d="M12.6 27.6a12 12 0 0 1 0-7.2v-5.3H5.8a20 20 0 0 0 0 17.8z"
                            />
                            <path
                                fill="#EA4335"
                                d="M24 12.1c3 0 5.7 1 7.8 3.1l5.8-5.8A19.5 19.5 0 0 0 24 4 20 20 0 0 0 5.8 15.1l6.8 5.3c1.6-4.8 6.1-8.3 11.4-8.3z"
                            />
                        </svg>
                        Continue with Google
                    </button>

                    <div className="login-signup">
                        Don't have an account?{' '}
                        <TextLink href={register()}>Sign up</TextLink>
                    </div>
                </section>

                <p className="login-footer">
                    CPDO Venue Reservation System
                </p>
            </main>
        </div>
    );
}


