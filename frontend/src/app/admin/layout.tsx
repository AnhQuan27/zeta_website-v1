import type { Metadata } from "next";
import { Inter } from "next/font/google";

import './globals.css';
import Navbar from '@/components/admin/Navbar';

const inter = Inter({ subsets: ["latin"] });

export const metadata: Metadata = {
    title: "ZETA Admin",
    description: "This is Admin Page of ZETA",
};

export default function AdminLayout({
    children,
}: {
    children: React.ReactNode;
}) {
    return (
        <html lang="en">
            <body className={inter.className}>
                <Navbar />
                {children}
            </body>
        </html>
    );
}