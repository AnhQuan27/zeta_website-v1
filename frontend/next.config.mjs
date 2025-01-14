/** @type {import('next').NextConfig} */
const nextConfig = {
    images: {
        remotePatterns: [
            {
                protocol: 'https',
                hostname: 'images.pexels.com',
            }
        ]
    },
    rewrites: async () => [
        {
            source: '/:path((?!admin).*)',
            destination: '/user/:path*',
        }
    ],
};

export default nextConfig;
